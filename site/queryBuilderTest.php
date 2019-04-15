<?php
use OrodirsNotebook\Core\Database\QueryBuilder;
use OrodirsNotebook\Core\Datamodel\Permission;
use OrodirsNotebook\Core\Config\EntitlementConfigLoader;
use OrodirsNotebook\Core\Authorization\UserPermissionResolver;

include_once $_SERVER['DOCUMENT_ROOT'].'/src/Core/autoloader.php';
session_start();
?>
<!DOCTYPE html>
<html lang="de_DE">
<head>
  <title>Orodir's Notebook</title>
</head>
<body>
  <?php
    $perm = EntitlementConfigLoader::load()->entitlements->self;
    $query = QueryBuilder::buildObjectQueryForPermission($perm, "users",
      "fullName LIKE '%mini%'", array(), "admin");
    var_dump($query);
   ?>
   <br />
   <br />
   <?php
    $test = UserPermissionResolver::resolveUserPermissions("admin");
    var_dump($test);
    $query = QueryBuilder::buildObjectQueryForPermission($test[0], "users",
      "fullName LIKE '%mini%'", array(), "admin");
    var_dump($query);
   ?>
</body>
</html>
