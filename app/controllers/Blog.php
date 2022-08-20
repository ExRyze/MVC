<?php
class Blog extends Controller {
  public function index() {
    $data["title"] = "Blog";
    $data["row"] = $this->model("Blog_model")->getAll();
    $this->view("template/header", $data);
    $this->view("blog/index", $data);
    $this->view("template/footer");
  }
}