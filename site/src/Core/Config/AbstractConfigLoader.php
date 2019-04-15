<?php
namespace OrodirsNotebook\Core\Config;

abstract class AbstractConfigLoader {
  public static abstract function load();
  protected static abstract function validate($config);
}
 ?>
