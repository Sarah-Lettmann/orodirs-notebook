<?php
session_start();
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
