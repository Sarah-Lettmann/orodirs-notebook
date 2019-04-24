<?php
namespace Com\KlosedSource\APIFramework\Controller;

use Com\KlosedSource\APIFramework\Permissions\PermissionResolver;
use Com\KlosedSource\APIFramework\Database\DatabaseConnector;
use Com\KlosedSource\APIFramework\HATEOAS\Link;
use Com\KlosedSource\APIFramework\RestResult;

abstract class AbstractController {

  protected $config;

  protected $endpoint;

  protected $links;

  protected $permissionResolver;
  protected $parameters;
  protected $databaseConnection;
  protected $_get;
  protected $_post;

  public function init($config) {
    $this->config = $config;
    $this->permissionResolver = new PermissionResolver();
    $this->permissionResolver->init($this->config);
    $this->databaseConnection = DatabaseConnector::getConnection($config);
    $this->links = array();
    $this->init();
  }

  public function processCall($endpoint, $parameters, $_get, $_post) {
    $this->endpoint = $endpoint;
    $this->parameters = $parameters;
    $this->_get = $_get;
    $this->_post = $_post;

    if($this->checkPermissions()) {
      $data = $this->process();
      // $this->resolveLinks($data);
    } else {
      $data = new RestResult();
      $data->statusCode = 403;
      $data->resultText = "Permission denied";
    }
    return $data;
  }

  private function checkPermissions() {
    $this->permissionResolver->checkPermission($this->endpoint,
    $this->parameters);
  }

  protected function registerLink($attribute, $url, $endpoint, $method, $rel, $isIdEndpoint) {
    $link = new Link();
    $link->attribute = $attribute;
    $link->endpoint = $endpoint;
    $link->method = $method;
    $link->rel = $rel;
    $link->isIdEndpoint = $isIdEndpoint;
    $link->url = $url;
    array_push($this->links, $link);
  }

  private function resolveLinks() {
    foreach($this->links as $link) {
      $curEndpoint = $link->endpoint["methods"][$link->method];
      $className = $endpoint["controllerClass"];
      $controller = new $className();
      if(is_a($controller, "Com\KlosedSource\APIFramework\Controller\AbstractController")) {
        if($link->$isIdEndpoint) {

        } else {
          if($this-permissionResolver->checkPermission($curEndpoint,
          $this->parameters)) {
              $attr = $link->attribute;
          }
        }
      }
    }
  }

  protected abstract function process();
  protected abstract function init();

}

?>
