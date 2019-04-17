<?php
////////////////////////////////////////////////////////////////////////////////
//
// File:          APIConfigLoader.php
// Class(es):     Com\KlosedSource\APIFramework\Config\APIConfigLoader
// Author:        Felix Klose
// E-Mail:        felix.klose@klosed-source.com
//
// Description:   ConfigLoader for the API JSON-Configuration
//
////////////////////////////////////////////////////////////////////////////////

namespace Com\KlosedSource\APIFramework\Config;
use Com\KlosedSource\Util\Config\AbstractConfigLoader;
use Com\KlosedSource\Util\Exception\InvalidConfigException;

class APIConfigLoader extends AbstractConfigLoader {

  private $errorMessage;

  public function loadConfig($fileName)
  {
    try {
      $json = file_get_contents($fileName);
      $config = json_decode($json, True);
    } catch (Exception $e) {
      throw new InvalidConfigException("Your API configuration is invalid.".
      " Please contact the system administrator.", $e);
    }
    if(!self::validateConfig($config)) {
      throw new InvalidConfigException("Your API configuration is invalid: ".
      $errorMessage." Please contact the system administrator.");
    }
    return $config;
  }

  public function validateConfig($config)
  {
    return True;
  }
}

?>
