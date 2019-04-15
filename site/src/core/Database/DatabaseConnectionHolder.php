<?php
namespace OrodirsNotebook\core\Database;

use \PDO;

class DatabaseConnectionHolder {
  private static $host;
  private static $port;
  private static $database;
  private static $username;
  private static $password;

  public static function getConnection() {
    if(empty(self::$host) || empty(self::$username) ||
      empty(self::$password) || empty(self::$database)) {
        DatabaseConnectionHolder::init();
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

  private static function init() {
    $dbConfig = parse_ini_file($_SERVER['DOCUMENT_ROOT']."/config/database.ini");
    self::$host = $dbConfig['host'];
    self::$port = $dbConfig['port'];
    self::$database = $dbConfig['database'];
    self::$username = $dbConfig['username'];
    self::$password = $dbConfig['password'];
  }
}
?>
