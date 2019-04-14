<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/library/autoloader.php';

session_start();
session_destroy();
header('Location: index.php');
?>
