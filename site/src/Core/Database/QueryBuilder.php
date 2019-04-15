<?php
namespace OrodirsNotebook\Core\Database;

class QueryBuilder {

  public static function buildObjectQueryForPermission($permission, $object,
  $whereClause, $whereArgs, $currentUser) {
    $query = "";

    $attributes = $permission->objects->$object->access->read;

    $query = "SELECT ".join(", ", $attributes)." FROM ".$object;

    if($permission->scope == "self") {
      if($object == "users") {
        $whereClause = "(".$whereClause.") AND username=?";
      } else {
        $whereClause = "(".$whereClause.") AND 1=0";
      }
    } else if($permission->scope == "owner") {
      $whereClause = "(".$whereClause.") AND owner=?";
    } 

    if(!empty($whereClause)) {
      $query = $query." WHERE ".$whereClause;
    }
    return $query;
  }
}
?>
