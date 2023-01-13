<?php

class Register extends Controllers {

  public function index() {
    return $this->view('register');
  }

  public function cregister() {
    if($_POST['password'] != $_POST['rpassword']) {Flasher::setFlasher("Password doesn't match", 'alert alert-warning'); return Functions::back();}
    if($this->model("Users")->validateUsername()) {Flasher::setFlasher("Username have been used.", 'alert alert-warning'); return Functions::back();}
    if($this->model("Users")->validateEmail()) {Flasher::setFlasher("Email have been used.", 'alert alert-warning'); return Functions::back();}
    if($this->model("Users")->register()) {Flasher::setFlasher("Account registered", 'alert alert-success'); return header('Location: '.BASE_URL);}
  }

}