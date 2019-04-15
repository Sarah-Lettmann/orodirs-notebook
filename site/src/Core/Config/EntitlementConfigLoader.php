<?php
namespace OrodirsNotebook\Core\Config;

class EntitlementConfigLoader extends AbstractConfigLoader {
  public static function load() {
    $entitlementConfig = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/config/entitlements.json"));
    return $entitlementConfig;
  }

  protected static function validate($config) {

  }
}
 ?>
