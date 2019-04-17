<?php
namespace OrodirsNotebook\Core\Authorization;

class PermissionSource {
  public function getUserPermissions($userId) {
    return array("everyone");
  }
}
 ?>
