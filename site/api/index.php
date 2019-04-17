<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/src/core/autoloader.php';

session_start();

if(!isset($_SESSION['username'])) {
  header("HTTP/1.1 401 Unauthorized");
  exit;
}
else {
  $url      = (isset($_GET['_url']) ? $_GET['_url'] : '');
  if(substr($url, 0, 3) == "v1/") {
    $dispatcherName = "OrodirsNotebook\\API\\V1\\Dispatcher";
    $url = substr($url, 3);
    $dispatcherName::dispatchRequest($url,
    $_SERVER['REQUEST_METHOD'], $_GET, $_POST, $_SESSION['username']);
  } else if(substr($url, 0, 3) == "v2/") {
    $dispatcherName = "Com\\KlosedSource\\APIFramework\\APICallDispatcher";
    $url = substr($url, 3);
    $dispatcher = new $dispatcherName();
    $dispatcher->init($_SERVER['DOCUMENT_ROOT']."/config/api-config.json");
    $dispatcher->dispatchCall($url);
  }
}

?>
