<?php
class Login extends Controller {
  public function index() {
    $data["title"] = "Login";
    $this->view("template/header", $data);
    $this->view("login/index", $data);
    $this->view("template/header");
  }

  public function config() {
    if(empty($_POST["nis"]) || empty($_POST["password"])) {
      header("location: ".BASE_URL."/login");
      exit();
    } else {
      $_SESSION["user"] = $this->model("User_model")->login($_POST);
      header("location: ".BASE_URL."/home");
    }
  }
}