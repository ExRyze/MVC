<?php

class Login extends Controller {

  public function index() {
    return $this->view("auth/login");
  }

}