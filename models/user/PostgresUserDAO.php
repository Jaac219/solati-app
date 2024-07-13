<?php
require_once 'UserDAOInterface.php';
require_once 'config/PostgresDatabase.php';
require_once 'User.php';

class PostgresUserDAO implements UserDAOInterface
{
  private $conn;

  public function __construct($config)
  {
    $this->conn = PostgresDatabase::getInstance($config)->getConnection();
  }

  public function getAllUsers()
  {
    $query = "SELECT * FROM users";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $users = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $users[] = new User($row['id'], $row['username'], $row['email']);
    }
    return $users;
  }

  public function getUserById($id)
  {
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
      return new User($row['id'], $row['username'], $row['email']);
    } else {
      return null;
    }
  }
}
