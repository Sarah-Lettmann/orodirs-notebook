<?php
  namespace OrodirsNotebook\core\Database\DAO;

  use OrodirsNotebook\core\Database;

  class UserDAO {
    public function readAllUsers() {
      $connection = Database\DatabaseConnectionHolder::getConnection();

      $statement = $connection->prepare("SELECT username, fullName,
        profileImageURL, emailAddress, pwdReset, locked FROM users");
      $result = $statement->execute(array());

      $userObjects = array();
      while($row = $statement->fetch()) {
        $obj = new \OrodirsNotebook\core\Datamodel\User();
        $obj->username = $row['username'];
        $obj->fullName = $row['fullName'];
        $obj->profileImageURL = $row['profileImageURL'];
        $obj->emailAddress = $row['emailAddress'];
        $obj->pwdReset = $row['pwdReset'] == 0 ? FALSE : TRUE;
        $obj->locked = $row['locked'] == 0 ? FALSE : TRUE;

        array_push($userObjects, $obj);
      }
      return $userObjects;
    }
  }
?>
