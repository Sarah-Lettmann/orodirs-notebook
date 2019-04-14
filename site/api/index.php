<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/library/autoloader.php';

session_start();

if(!isset($_SESSION['username'])) {
  header("HTTP/1.1 401 Unauthorized");
  exit;
}
else {
  $url      = (isset($_GET['_url']) ? $_GET['_url'] : '');
  OrodirsNotebook\API\Dispatcher::dispatchRequest($url,
  $_SERVER['REQUEST_METHOD'], $_GET, $_POST, $_SESSION['username']);
}

?>
