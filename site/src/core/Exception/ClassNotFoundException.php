<?php
namespace OrodirsNotebook\Core\Exception;

class ClassNotFoundException extends Exception {

  public function errorMessage() {
    //error message
    $errorMsg = 'API Error: class ' + $this->getMessage() ' not found.';
    return $errorMsg;
  }
}
?>
