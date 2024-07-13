<?php
require_once 'PostgresUserDAO.php';

class UserFactory
{
  public static function getUserDAO($type)
  {
    $config = require 'config/config.php';

    switch ($type) {
      case 'pgsql':
        return new PostgresUserDAO($config["postgresDatabase"]);
        // case 'mysql':
        //     return new MySQLUsuarioDAO();
        // case 'mongodb':
        //     return new MongoDBUsuarioDAO();
      default:
        throw new Exception("Tipo de base de datos no soportado.");
    }
  }
}
