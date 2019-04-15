<?php
namespace OrodirsNotebook\Core\Config;

class DatabaseConfigLoader extends AbstractConfigLoader {
  public static function load() {
    $databaseConfig = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/config/database.json"));
    return $databaseConfig;
  }

  protected static function validate($config) {

  }
}
 ?>
