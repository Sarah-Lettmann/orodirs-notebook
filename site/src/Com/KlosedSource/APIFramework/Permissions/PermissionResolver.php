<?php

namespace Com\KlosedSource\APIFramework\Permissions;

use Com\KlosedSource\APIFramework\Database\DatabaseConnector;

class PermissionResolver {
  private $config;
  private $permissionSource;
  private $dataSource;
  private $connection;

  public function init($config) {
    // Store the current config object
    $this->config = $config;
    // Retreive permission source object
    $className = $this->config["permissionSource"]["class"];
    $this->permissionSource = new $className();
    // Connect to database
    $this->dataSource = $this->config["dataSource"];
    $this->connection = DatabaseConnector::getConnection($this->dataSource);
  }

  public function getAllValidTargets($endpoint, $queryParameter) {
    // Get the current user's userId
    $adminIdParam = $config["adminIdParam"];
    $userId = isset($_SESSION[$adminIdParam]) &&
    is_string($_SESSION[$adminIdParam]) ?
    $_SESSION[$adminIdParam] : '';

    // Initialize result array
    $validTargets = array();

    // If there are no permissions, the result array remains empty. Otherwise
    // Get all valid targets
    if(array_key_exists("permissions", $endpoint)) {

      // Iterate over permission definitions
      foreach($endpoint["permissions"] as $permission) {
        // First of all, check if the current user has any of the permissions
        // required by this endpoint
        $isValidAdmin = $this->checkSinglePermission($permission,
        $queryParameter, $userId);
        // If that's the case, get all targets that are allowed by the
        // currently checked permission
        if($isValidAdmin) {
          $tmpValidTargets = $this->getValidTargets($permission, $queryParameter,
          $userId);
          // If an "ALL" is found, stop execution and return "ALL"
          if(is_string($tmpValidTargets) && $tmpValidTargets == "ALL") {
            $validTargets = "ALL";
            break;
          }
          // Otherwise, merge the found valid targets into the result array
          else {
            foreach($tmpValidTargets as $target) {
              if(!in_array($target, $validTargets)) {
                array_push($validTargets, $target);
              }
            }
          }
        }
      }
    }
    return $validTargets;
  }

  public function checkPermission($endpoint, $queryParameter) {
    // Get the current user's userId
    $adminIdParam = $this->config["adminIdParam"];
    $userId = isset($_SESSION[$adminIdParam]) &&
    is_string($_SESSION[$adminIdParam]) ?
    $_SESSION[$adminIdParam] : '';

    // Initialize result
    $isValidAdmin = False;

    // If there are no permissions, the result is False. Otherwise, all
    // permissions are checked
    if(array_key_exists("permissions", $endpoint)) {

      // Iterate over permission definitions
      foreach($endpoint["permissions"] as $permission) {
        // First of all, check if the current user has any of the permissions
        // required by this endpoint
        $tmpIsValidAdmin = $this->checkSinglePermission($permission,
        $queryParameter, $userId);
        // If that's the case and parameters are given, check if the last
        // parameter in the array (which is assumed to be the current parameter)
        if($tmpIsValidAdmin && !empty($queryParameter)) {
          $tmpIsValidAdmin = False;
          $validTargets = $this->getValidTargets($permission, $queryParameter,
          $userId);
          // If an "ALL" is found, the result is True
          if(is_string($validTargets) && $validTargets == "ALL") {
            $tmpIsValidAdmin = True;
          }
          // Otherwise, the result is True iff the validTargets-array contains
          // the queryParameter
          else if (in_array($queryParameter, $validTargets)) {
            $tmpIsValidAdmin = True;
          }
        }
        // The method result is a disjunction of all single-permission checks
        $isValidAdmin |= $tmpIsValidAdmin;
      }
    }
    return $isValidAdmin;
  }

  private function checkSinglePermission($permission, $queryParameter, $userId) {
    $result = array();
    $isValidAdmin = False;
    // Check admin permissions and return the result
    if(array_key_exists("adminPermissions", $permission)) {
      $isValidAdmin = $this->checkAdminPermissions($permission, $queryParameter,
      $userId);
    }
    return $isValidAdmin;
  }

  private function checkAdminPermissions($permission, $queryParameter, $userId) {
    $isValidAdmin = False;
    $adminPermissions = $permission["adminPermissions"];
    // If the adminPermissions contain "everyone", the result is always True
    if(in_array("everyone", $adminPermissions)) {
      $isValidAdmin = True;
    }
    // Otherwise, check if the user has at least one of the needed permissions
    else {
      $userPermissions = $this->getUserPermissions($userId);
      foreach($adminPermissions as $permissionName) {
        $isValidAdmin |= array_key_exists($permissionName, $adminPermissions);
      }
    }
    return $isValidAdmin;
  }

  private function getValidTargets($permission, $queryParameter, $userId) {
    $targetType = $permission["targetType"];
    $validTargets = array();
    // Calculate valid targets based on target type
    switch($targetType) {
      case "self":
      $validTargets = array($userId);
      break;
      case "all":
      $validTargets = "ALL";
      break;
      case "query":
      $validTargets = $this->checkTargetQuery($permission, $queryParameter,
      $userId);
      break;
    }
    return $validTargets;
  }

  private function checkTargetQuery($permission, $queryParameter, $userId) {
    // Prepare and execute the query
    $validTargets = array();
    $query = $permission["targetQuery"];
    $statement = $this->connection->prepare($query);
    $statementResult = $statement->execute(array('user' => $userId));

    // Iterate through the result
    while ($row = $statement->fetch()) {
      array_push($validTargets, $row[0]);
    }
    return $validTargets;
  }

  private function getUserPermissions($userId) {
    // Call the permissionSource method to retreive the current user's
    // permissions
    $methodName = $this->config["permissionSource"]["method"];
    return $this->permissionSource->$methodName($userId);
  }
}

?>
