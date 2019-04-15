<?php
namespace OrodirsNotebook\Core\Authorization;

use OrodirsNotebook\core\Database\DatabaseConnectionHolder;

class LoginHelper {
  public static function handleLogin($username, $password) {
    $pdo = DatabaseConnectionHolder::getConnection();

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
  }
 ?>
