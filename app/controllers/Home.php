<?php

class Home extends Controller {

  public function __construct() {
    Middleware::auth(false);
  }

  public function index() {
    $data['page'] = "Home";
    return $this->view('index', $data);
  }

}