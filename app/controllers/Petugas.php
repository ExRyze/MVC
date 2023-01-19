<?php

class Petugas extends Controller {

  public function index() {
    Middleware::auth();
    $data['page'] = "Admin Home";
    return $this->view('index', $data);
  }

  // public function login() {
  //   Middleware::auth(true);
  //   $data['page'] = "Admin Login";
  //   return $this->view('admin/login', $data);
  // }
}