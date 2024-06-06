<?php
  require 'models/Bonus.php';
  //headers
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: " . $method);
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  // manage the answer of all resources from the frontend
  function getALLHandler($id=null) {
    global $query;
    header("Content-Type: application/json; charset=UTF-8");
    try {
      $bonus = $query->getAll('bonus');
      http_response_code(200);
      echo json_encode($bonus);
    } catch (Error $e) {
      json_encode(array("message" => $e->getMessage()));
      http_response_code(500);
    }
  }
  // manage the answer of one resources from the frontend
  function getOneHanlder($id) {
    global $query;
    header("Content-Type: application/json; charset=UTF-8");
    try {
      $bonus = $query->getOne('bonus', $id);
      if(count($bonus) == 0) {
        http_response_code(404);
        echo json_encode(array("message" => "resources not found."));
      }
      else {
        http_response_code(200);
        echo json_encode($bonus);
      }
    } catch (Exception $e) {
      echo json_encode(array("message" => $e->getMessage()));
      http_response_code(500);
    }
  }
  // manage the answer of insertion of resource from the frontend 
  function postHandler($id=null) {
    global $query;
    $json_request = json_decode(file_get_contents("php://input"),true);  
    try {
      Bonus::checker($json_request);
      $query->post('bonus', $json_request);
      http_response_code(201);
    } catch(TypeError $e) {
      http_response_code(400);
      echo json_encode(array("message" => $e->getMessage()));
    }
  }
  // manage the answer of deleteing resources to the frontend 
  function deleteHandler($id) {
    global $query;
    try {
      $query->delete('bonus', $id);
      http_response_code(200);
    } catch (Exception $e) {
      http_response_code(500);
      echo json_encode(array("message" => $e->getMessage()));
    }
  }
  // manage the answer of updating resources to the frontend 
  function updateHandler($id) {
    global $query;
    $json_request = json_decode(file_get_contents("php://input"),true);
    try {
      $query->update('bonus', $json_request, $id);
    } catch (Exception $e) {
      echo json_encode(array("message" => $e->getMessage()));
    }
  }

 