<?php
  //headers
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: " . $method);
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  function filterhandler($id) {
    global $query;
    //var_dump(urldecode($id));
    if(key($_GET) == 'name') {
      try {
        $filter = $query->typeFilter($_GET['name']);
        if(count($filter) == 0) {
          http_response_code(404);
          echo json_encode(array("message" => "resources not found."));
        } 
        else {
          echo json_encode($filter);
          http_response_code(200);
        }
      } catch (Error $e) {
        json_encode(array("message" => $e->getMessage()));
        http_response_code(500);
      }
    }

    else if (key($_GET) == "dateS") {
      try {
        $filter = $query->dateFilter($_GET['dateS'], $_GET['dateE']);
        if(count($filter) == 0) {
          http_response_code(404);
          echo json_encode(array("message" => "resources not found."));
        } 
        else {
          echo json_encode($filter);
          http_response_code(200);
        }
      } catch (Error $e) {
        json_encode(array("message" => $e->getMessage()));
        http_response_code(500);
      }
    }
    else {
      try {
        $filter = $query->countFilter();
        if(count($filter) == 0) {
          http_response_code(404);
          echo json_encode(array("message" => "resources not found."));
        } 
        else {
          echo json_encode($filter);
          http_response_code(200);
        }
      } catch (Error $e) {
        json_encode(array("message" => $e->getMessage()));
        http_response_code(500);
      }
    }

  }