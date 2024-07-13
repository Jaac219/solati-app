<?php
require_once 'models/user/UserFactory.php';

class UserController
{
  private $userDao;

  public function __construct($type)
  {
    $this->userDao = UserFactory::getUserDAO($type);
  }

  public function getUsers()
  {
    $users = $this->userDao->getAllUsers();
    echo json_encode(["status" => 200, "results" => $users]);
  }

  public function getUser($id)
  {
    $user = $this->userDao->getUserById($id);
    echo json_encode(["status" => 200, "results" => $user]);
  }
}
