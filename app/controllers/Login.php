<?php

class Login extends Controllers {

  public function index() {
    return $this->view('login');
  }

  public function forgotpassword() {
    return $this->view('forgot-password');
  }

}