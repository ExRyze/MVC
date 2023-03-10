<?php

class Login extends Controller {

  public function __construct() {
    Middleware::noAuth();
  }

  public function index() {
    if(!empty($_POST)) {
      if($this->model("pengguna")->validate()) {
        Flasher::setMessage("Selamat datang!", "success");
        if($this->model("pengguna")->validate()['role'] === "siswa") {
          $_SESSION['sppsch2'] = $this->model("pengguna")->logSiswa();
          Middleware::role();
        } else {
          $_SESSION['sppsch2'] = $this->model("pengguna")->logPetugas();
          Middleware::role();
        }
      } else {
        Flasher::setMessage("Data tidak ada...", "warning");
      }
    }
    return $this->view("auth/login");
  }

}