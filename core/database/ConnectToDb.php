<?php

class ConnectToDb {
  public static function connect($config) {
    try {
      return new PDO(
        $config['connection'] . 'dbname=' . $config['name'],
        $config['username'], 
        $config['password']);
    }
    catch (PDOException $e) { 
      http_response_code(500);
      echo json_encode(array("message" => "Internal error."));
    }
 }
}