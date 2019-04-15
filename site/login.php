<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/src/Core/autoloader.php';

use OrodirsNotebook\core\Database\DatabaseConnectionHolder;

session_start();

$pdo = DatabaseConnectionHolder::getConnection();

if(isset($_GET['login'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $statement = $pdo->prepare("SELECT username, locked, pwdReset FROM users
    WHERE username = :username
    AND password=SHA2( :password, 512)");
    $result = $statement->execute(array('username' => $username,
    'password' => $password));
    $user = $statement->fetch();

    if ($user !== false) {
      $_SESSION['username'] = $user['username'];
      header('Location: index.php');
    } else {
      $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }
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
