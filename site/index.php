<?php
use OrodirsNotebook\API\Database\DatabaseConnectionHolder;

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

include_once './api/Database/DatabaseConnectionHolder.php';
$pdo = DatabaseConnectionHolder::getConnection();
?>
<!DOCTYPE html>
<html lang="de_DE">
<head>
  <title>Orodir's Notebook</title>
</head>
<body>
  <?php
  if(isset($_SESSION['username'])) {
    echo 'Hallo, '.$_SESSION['username'].'.<br />';
    ?>
    <a href="./logout.php">Logout</a>
    <?php
  } else {
    ?>
    <a href="./login.php">Login</a>
    <?php
  }
  ?>
</body>
</html>
