<?php
  namespace OrodirsNotebook\API;

  class Dispatcher {
    static function dispatchRequest($url, $method,
    $getParams, $postParams, $currentUser) {

      $urlParts = explode('/', $url);
      $baseType = $urlParts[0];
      $params = array();
      $types = array();

      for ($i = 1; $i < sizeof($urlParts); $i++) {
        if($i % 2 == 0) {
          array_push($types, $urlParts[$i]);
        } else {
          array_push($params, $urlParts[$i]);
        }
      }

      $method = Dispatcher::resolveAction($method);

      $className = '\\OrodirsNotebook\\API\\Controller\\'.ucfirst($baseType)."Controller";
      $methodName = $method;

      foreach ($types as $typeName) {
        $methodName = $methodName.ucfirst($typeName);
      }

      if (!class_exists($className)) {
        throw new OrodirsNotebook\API\Exception\ClassNotFoundException();
      }
      if (!method_exists($className, $methodName)) {
        throw new OrodirsNotebook\API\Exception\MethodNotFoundException();
      }

      $controller = new $className();
      $controller->$methodName($params, $getParams, $postParams, $currentUser);
    }

    private static function resolveAction($method) {
      switch ($method) {
        case 'GET':
          $controllerAction = 'read';
          break;
        case 'PUT':
          $controllerAction = 'update';
          break;
        case 'POST':
          $controllerAction = 'create';
          break;
        case 'DELETE':
          $controllerAction = 'delete';
          break;
        default:
          break;
      }
      return $controllerAction;
    }
  }
?>
