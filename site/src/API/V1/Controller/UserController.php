<?php
namespace OrodirsNotebook\API\V1\Controller;

use OrodirsNotebook\Core\Database\DAO;

class UserController {
  public function read($params, $getParams, $postParams, $currentUser) {
    $dao = new DAO\UserDAO();
    $result = $dao->readAllUsers();

    header('HTTP/1.0 200 OK');
    header('Content-Type: application/json');
    echo json_encode($result);
  }
}
?>
