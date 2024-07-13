<?php

require_once 'DatabaseInterface.php';

class PostgresDatabase implements DatabaseInterface
{

  private static $instance = null;
  private $connection;

  private function __construct($config)
  {
    try {
      $this->connection = new PDO(
        $config['connection'] . ';dbname=' . $config['name'],
        $config['username'],
        $config['password'],
        $config['options']
      );
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die('Error de conexión: ' . $e->getMessage());
    }
  }

  public static function getInstance($config)
  {
    if (!self::$instance) {
      self::$instance = new self($config);
    }
    return self::$instance;
  }

  public function getConnection()
  {
    return $this->connection;
  }
}
