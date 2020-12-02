<?php
namespace Com\KlosedSource\APIFramework\Database;

use \PDO;
use Com\KlosedSource\APIFramework\Config\APIConfigLoader;

class DatabaseConnector {
  private static $host;
  private static $port;
  private static $database;
  private static $username;
  private static $password;

  public static function getConnection($config) {
    if(empty(self::$host) || empty(self::$username) ||
      empty(self::$password) || empty(self::$database)) {
        DatabaseConnector::init($config);
    }
    $initialized = FALSE;
    try{
      $hostString = "mysql:host=" . self::$host . ":" . self::$port .
      ";dbname=" . self::$database;
      $connection = new PDO($hostString,
      self::$username,
      self::$password);
      $connection->exec("set names utf8");
      $initialized = TRUE;
    }catch(PDOException $exception){
      echo "Error: " . $exception->getMessage();
    }
    if($initialized) {
      return $connection;
    }
    return FALSE;
  }

  private static function init($config) {
    self::$host = $config["host"];
    self::$port = $config["port"];
    self::$database = $config["database"];
    self::$username = $config["username"];
    self::$password = $config["password"];
  }
}
?>
