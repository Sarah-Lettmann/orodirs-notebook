<?php
namespace OrodirsNotebook\Core\Exception;

class MethodNotFoundException extends Exception {

  public function errorMessage() {
    //error message
    $errorMsg = 'API Error: method ' + $this->getMessage() ' not found.';
    return $errorMsg;
  }
}
?>
