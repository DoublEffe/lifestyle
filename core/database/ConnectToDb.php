<?php

class ConnectToDb {
  public static function connect() {
    try {
      return new PDO('mysql:host=localhost:3306;dbname=pa', 'root', '');
    }
    catch (PDOException $e) { 
      http_response_code(500);
      echo json_encode(array("message" => "Internal error."));
    }
 }
}