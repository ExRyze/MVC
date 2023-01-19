<?php

class Home extends Controller {

  public function index() {
    $data['page'] = "Home";
    return $this->view('index', $data);
  }

}