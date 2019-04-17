<?php

namespace Com\KlosedSource\APIFramework;

use Com\KlosedSource\APIFramework\Config\APIConfigLoader;
use Com\KlosedSource\APIFramework\APIError;
use Com\KlosedSource\Util\Exception\InvalidConfigException;
use Com\KlosedSource\APIFramework\Permissions\PermissionResolver;

class APICallDispatcher {

  private $permissionResolver;
  private $config;

  public function init($configFilePath) {
    try {
      $configLoader = new APIConfigLoader();
      $this->config = $configLoader->loadConfig($configFilePath);
      $this->permissionResolver = new PermissionResolver();
      $this->permissionResolver->init($this->config);

    } catch(InvalidConfigException $e) {
      $error = new APIError($e->getMessage());
      $this->error(500, $error);
    }
  }

  public function dispatchCall($url) {
    try {
      if(!$this->checkAuthentication()) {
        $error = new APIError("Not authenticated");
        $this->error(401, $error);
      }
      $urlParts = explode('/', $url);
      $endpoint = $this->config["endpoints"];
      $params = array();
      foreach($urlParts as $part) {
        $isParam = False;
        if(array_key_exists($part, $endpoint)) {
          $endpoint = $endpoint[$part];
        } else if (array_key_exists("_id", $endpoint)) {
          $endpoint = $endpoint["_id"];
          $isParam = True;
          array_push($params, $part);
        } else {
          $error = new APIError("The requested endpoint ".$part." (".$url.") does not exist");
          $this->error(400, $error);
        }
        $this->processCall($endpoint["methods"], $params, $isParam);
      }
    } catch(Exception $e) {
      // this can't occur,
      $error = new APIError($e->getMessage());
      $this->error(500, $error);
    }
  }

  private function checkAuthentication() {
    $adminIdParam = $this->config["adminIdParam"];

    $userId = isset($_SESSION[$adminIdParam]) &&
    is_string($_SESSION[$adminIdParam]) ?
    $_SESSION[$adminIdParam] : '';

    return !empty($userId);
  }

  private function processCall($endpoint, $params, $hasParam) {
    $endpoint = $this->checkRequestMethod($endpoint);
    $queryParameter = '';
    if($hasParam) {
      $queryParameter = end($params);
    }
    if($this->permissionResolver->checkPermission($endpoint, $queryParameter)) {
      $className = $endpoint["controllerClass"];
      $methodName = $endpoint["controllerMethod"];
      $controller = new $className();
      $controller->$methodName($queryParameter, $this->permissionResolver);
    } else {
      $error = new APIError("Permission denied.");
      $this->error(403, $error);
    }
  }

  private function checkRequestMethod($endpoint) {
    $requestMethod = (string)filter_input(INPUT_SERVER, "REQUEST_METHOD");

    $validMethod = array_key_exists($requestMethod, $endpoint);

    if($validMethod) {
      $endpoint = $endpoint[$requestMethod];
    } else {
      $error = new APIError("Method ".$requestMethod." not allowed.");
      $this->error(405, $error);
    }
    return $endpoint;
  }

  public function error($httpStatus, $errorMessage) {
    http_response_code($httpStatus);
    echo json_encode($errorMessage);
    exit;
  }

}

?>
