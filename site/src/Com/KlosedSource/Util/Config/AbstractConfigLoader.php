<?php
////////////////////////////////////////////////////////////////////////////////
//
// File:          AbstractConfigLoader.php
// Class(es):     Com\KlosedSource\Util\Config\AbstractConfigLoader
// Author:        Felix Klose
// E-Mail:        felix.klose@klosed-source.com
//
// Description:   Abstract class for configuration loaders. Handles loading,
//                parsing and validation of configuration files.
//
////////////////////////////////////////////////////////////////////////////////

namespace Com\KlosedSource\Util\Config;

/* Abstract class for loading and validation configuration files
 */
abstract class AbstractConfigLoader {

  /* Reads and parses the contents of the file $fileName and validates the
   * resulting object.
   *
   * parameters:  $fileName: The path to the loaded config file
   * returns:     The parsed contents of the loaded config file
   * throws:      Com\KlosedSource\Exception\InvalidArgumentException if the
   *              file could not be loaded, there were any problems while
   *              parsing or the validation of the config object failed.
  */
  public abstract function loadConfig($fileName);

  /* Reads and parses the contents of the file $fileName and validates the
   * resulting object.
   *
   * parameters:  $config: The configuration object that will be validated
   * returns:     True, iff the configuration passed to the function is valid,
   *              otherwise false
  */
  public abstract function validateConfig($config);
}

?>
