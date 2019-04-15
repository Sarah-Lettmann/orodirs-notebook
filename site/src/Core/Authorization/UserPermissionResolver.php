<?php
namespace OrodirsNotebook\Core\Authorization;

use OrodirsNotebook\Core\Database;
use OrodirsNotebook\Core\Datamodel;
use OrodirsNotebook\Core\Config;

class UserPermissionResolver {

  private static $connection;
  private static $entitlements;

  public static function resolveUserPermissions($username) {
    $connection = Database\DatabaseConnectionHolder::getConnection();
    $entitlements = Config\EntitlementConfigLoader::load()->entitlements;

    $statement = $connection->prepare("SELECT rolename, context FROM
    roleAssignments WHERE username=?");
    $statement->execute(array($username));

    $result = array();
    while($row = $statement->fetch()) {
      $curRole = new Datamodel\RoleAssignment();
      $curRole->username = $username;
      $curRole->rolename = $row["rolename"];
      $curRole->context = $row["context"];

      $ents = self::resolveRoleAssignmentPermissions($curRole);
      $result = array_merge($result, $ents);
    }
    return $result;
  }

  private static function resolveRoleAssignmentPermissions($role) {
    $connection = Database\DatabaseConnectionHolder::getConnection();
    $entitlements = Config\EntitlementConfigLoader::load()->entitlements;

    $statement = $connection->prepare("SELECT entitlementName FROM
    roleEntitlements WHERE rolename=?");
    $statement->execute(array($role->rolename));

    $result = array();
    while($row = $statement->fetch()) {
      $entName = $row['entitlementName'];
      if(!empty($entitlements) && !empty($entitlements->$entName)) {
        $ent = $entitlements->$entName;
        $ent->context = $role->context;
        array_push($result, $ent);
      }
    }
    return $result;
  }
}
 ?>
