<?php

class App {
  protected $controller = Controller;
  protected $method = Method;
  protected $params = Params;
  
  public function __construct() {
    $url = $this->parseURL();

    if(isset($url)) {
      if(file_exists("../app/view/".$url[0].".php")) {
        $this->controller = $url[0];
        unset($url[0]);
      }
    }

    require_once "../app/view/" . $this->controller . ".php";
    $this->controller = new $this->controller;

    if(isset($url[1])) {
      if(method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    if(isset($url[2])) {
      $this->params = array_values($url);
      unset($url);
    }

    call_user_func_array([$this->controller, $this->method], $this->params);

  }

  public function parseURL() {
    if(isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}