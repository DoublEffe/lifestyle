<?php
  $config = require 'config.php';
  require 'core/database/ConnectToDb.php';
  require 'core/database/DbQuery.php';
  try {
    $pdo = ConnectToDb::connect($config['database']);
  } catch (TypeError $e) {
    echo json_encode(array("message" => $e->getMessage()));
  }
  $query = new DbQuery($pdo);
 
  global $query;
  require 'core/Router.php';
  
