<?php
namespace OrodirsNotebook\API\V2\Controller;

use OrodirsNotebook\Core\Database\DAO;
use Com\KlosedSource\APIFramework\Controller\AbstractController;
use Com\KlosedSource\APIFramework\RestResult;

class AllUsersController extends AbstractController {


  protected function process() {
    $dao = new DAO\UserDAO();
    $result = $dao->readAllUsers();

    $validTargets = $this->permissionResolver->getAllValidTargets($this->endpoint,
      $this->parameters);

    if(is_string($validTargets) && $validTargets == "ALL") {
      $restResult = new RestResult();
      $restResult->statusCode = 200;
      $restResult->resultText = json_encode($result);
    } else {
      $output = array();

      foreach($result as $user) {
        if(in_array($user->username, $validTargets)) {
          array_push($output, $user);
        }
      }

      $restResult = new RestResult();
      $restResult->statusCode = 200;
      $restResult->resultText = json_encode($output);
    }

    return $restResult;
  }
}
?>
