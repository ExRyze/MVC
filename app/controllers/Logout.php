<?php

class Logout extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function index() {
    session_destroy();
    return Functions::redirect("login");
  }

}