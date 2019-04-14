<?php

session_start();

spl_autoload_register(function ($className) {
 if (substr($className, 0, 15) !== 'OrodirsNotebook') {
    // not our business
    return;
 }

 $fileName = $_SERVER['DOCUMENT_ROOT'].'/'.str_replace('\\', DIRECTORY_SEPARATOR, substr($className, 15)).'.php';

 if (file_exists($fileName)) {
    include $fileName;
 }
});

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
