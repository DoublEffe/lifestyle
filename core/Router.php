<?php
  // this class manage all the routes redirecting to the correct handler
  
  class Router {
    // all routes, here can be added new routes
    protected $routes = [
          'bonuses/{id}'=> [
            'get' => 'getOneHanlder',
            'delete' => 'deleteHandler',
            'put' => 'updateHandler',
          ],
          'bonuses'=> [
            'get' => 'getALLHandler',
            'post' => 'postHandler'
          ],
          '' => [
            'get' => 'getALLHandler',
            'post' => 'postHandler',
          ],
          '{id}' => [
            'get' => 'getOneHanlder',
            'delete' => 'deleteHandler',
            'put' => 'updateHandler',
          ],
          
          
    ];
    // redirect normal route or route with query
    public function redirect ($uri,$method){
      foreach ($this->routes as $route => $handler) {
        if (preg_match('/\{id\}/', $route)) {
          $routePattern = preg_replace('/\{id\}/', '(\d+)', $route);
          if (preg_match("#^$routePattern$#", $uri, $matches)) {
            $id = $matches[1];
            return $this->callHAndler($handler, $method, $id, $uri);
          }
        } else if ($route === $uri) {
          return $this->callHAndler($handler, $method, null, $uri);
        }
      }
      throw new Exception('no route found');
    }
    // calling the correct handler from the $routes
    private function callHandler($handlers, $method, $id=null, $uri) {
      if(isset($handlers[$method])) {
        if($uri === 'bonuses' or preg_match('/bonuses\/(\d+)/', $uri)){
          require 'controllers/create-bonuses.php';
        }else{
          require 'controllers/create-type.php';
        }
        $handler = $handlers[$method];
        if(is_callable($handler)) {
          return $handler($id);
        }
        else {
          throw new Exception("Handler for $method is not callable");
        }
      }
      else {
        throw new Exception("Method $method not allowed for this route");
      }
    }
  }
