<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/src/Core/autoloader.php';

session_start();
session_destroy();
header('Location: index.php');
?>
