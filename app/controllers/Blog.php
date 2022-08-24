<?php
class Blog extends Controller {
  public function index() {
    $data["title"] = "Blog";
    $data["row"] = $this->model("Blog_model")->getAll();
    $this->view("template/header", $data);
    $this->view("blog/index", $data);
    $this->view("template/footer");
  }

  public function add() {
    $data["title"] = "Add Blog";
    $this->view("template/header", $data);
    $this->view("blog/add", $data);
    $this->view("template/footer");
  }

  public function addConfig() {
    if(empty($_POST["title"]) || empty($_POST["description"])) {
      header("location: ".BASE_URL."/add");
      exit();
    } else {
      $data["row"] = $this->model("Blog_model")->insert($_POST);
      header("location: ".BASE_URL."/blog");
    }
  }
}