<?php

namespace Com\KlosedSource\APIFramework;

class APIError {

  public function __construct($message) {
    $this->message = $message;
  }

  public $errorCode;
  public $message;

}

?>
