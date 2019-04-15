<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/src/Core/autoloader.php';

use OrodirsNotebook\Core\Authorization\LoginHelper;

session_start();

if(isset($_GET['login'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  LoginHelper::handleLogin($username, $password);
}
  ?>
  <!DOCTYPE html>
  <html lang="de_DE">
  <head>
    <title>Orodir's Notebook</title>
  </head>
  <body>
    <?php
    if(isset($errorMessage)) {
      echo $errorMessage;
    }
    ?>

    <form action="?login=1" method="post">
      Nutzername:<br>
      <input type="text" size="40" maxlength="250" name="username"><br><br>
      Passwort:<br>
      <input type="password" size="40"  maxlength="250" name="password"><br>

      <input type="submit" value="Abschicken">
    </form>
  </body>
  </html>
