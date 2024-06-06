<?php
  // entry point of the backend
  require 'core/bootstrap.php';
  $router = new Router();
  $method = strtolower($_SERVER['REQUEST_METHOD']);
  $uri = trim($_SERVER['REQUEST_URI'], '/');
  try {
    $router->redirect($uri, $method);
  } catch (Exception $e) {
    echo json_encode(array("message" => $e->getMessage()));
    http_response_code(405);
  }

