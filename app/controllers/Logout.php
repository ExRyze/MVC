<?php

class Logout extends Controllers {

  public function __construct() {
    Middleware::auth();
  }

  public function index() {
    session_destroy();
    return header("Location: ".BASE_URL."/login");
  }

}