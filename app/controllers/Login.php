<?php

class Login extends Controllers {

  public function __construct() {
    Middleware::noAuth();
  }

  public function index() {
    return $this->view('auth/login');
  }

  public function clogin() {
    if($this->model('Petugas')->validateLogin()) {
      $_SESSION['ExSPP']['user'] = $this->model('Petugas')->login();
      Flasher::setFlasher("Berhasil Login", "alert alert-success");
      return header("Location: ".BASE_URL."/petugas");
    } else if($this->model('Siswa')->validateLogin()) {
      $_SESSION['ExSPP']['user'] = $this->model('Siswa')->login();
      Flasher::setFlasher("Berhasil Login", "alert alert-success");
      return header("Location: ".BASE_URL);
    }
    Flasher::setFlasher("Terjadi kesalahan!", "alert alert-danger");
    return Functions::back();
  }

}