<?php

require 'controllers/UserController.php';

$controller = new UserController('pgsql');

$routesArray = explode("/", $_SERVER['REQUEST_URI']);
$route = explode("?", $routesArray[2])[0];

if ($route == 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET['id'])) $controller->getUser($_GET['id']);
  else $controller->getUsers();
} else {
  echo json_encode(["status" => 404, "results" => "Not Found"], http_response_code(404));
}
