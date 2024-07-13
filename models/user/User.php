<?php
class User
{
  public $id;
  public $username;
  public $email;
  private $password;

  public function __construct($id = null, $username = null, $email = null)
  {
    $this->id = $id;
    $this->username = $username;
    $this->email = $email;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }
}
