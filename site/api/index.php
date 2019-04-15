<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/src/core/autoloader.php';

session_start();

if(!isset($_SESSION['username'])) {
  header("HTTP/1.1 401 Unauthorized");
  exit;
}
else {
  $url      = (isset($_GET['_url']) ? $_GET['_url'] : '');
  $dispatcherName = "OrodirsNotebook\\API\\";
  if(substr($url, 0, 3) == "v1/") {
    $dispatcherName = $dispatcherName."V1\\Dispatcher";
    $url = substr($url, 3);
  }
  $dispatcherName::dispatchRequest($url,
  $_SERVER['REQUEST_METHOD'], $_GET, $_POST, $_SESSION['username']);
}

?>
