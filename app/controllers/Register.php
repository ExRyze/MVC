<?php
class Register extends Controller {
  public function index() {
    $data["title"] = "Register";
    $this->view("template/header", $data);
    $this->view("register/index", $data);
    $this->view("template/header");
  }

  public function config() {
    if(empty($_POST["nis"]) || empty($_POST["name"]) || empty($_POST["password"])) {
      header("location: ".BASE_URL."/register");
      exit();
    } else {
      $this->model("User_model")->insert($_POST);
      header("location: ".BASE_URL."/home");
    }
  }
}