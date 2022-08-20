<?php
class User extends Controller {
  public function index() {
    $data["title"] = "User";
    $data["row"] = $this->model("User_model")->getAll();
    $this->view("template/header", $data);
    $this->view("user/index", $data);
    $this->view("template/footer");
  }
}