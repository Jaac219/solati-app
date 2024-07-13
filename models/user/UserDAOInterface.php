<?php

interface UserDAOInterface {
  public function getAllUsers();
  public function getUserById($id);
}