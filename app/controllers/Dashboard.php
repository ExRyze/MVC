<?php

class Dashboard extends Controller {

  public function index() {
    return $this->view('dashboard');
  }

}