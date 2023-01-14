<?php

class Login extends Controllers {

  public function index() {
    return $this->view('login');
  }

  public function forgotpassword() {
    return $this->view('forgot-password');
  }

  public function clogin() {
    var_dump($_POST);
    if($this->model('Siswa')->validate()) {
      $_SESSION['user'] = $this->model('Siswa')->login();
      Flasher::setFlasher("Berhasil Login", "alert alert-success");
      return header("Location: ".BASE_URL);
    }
    Flasher::setFlasher("Terjadi kesalahan!", "alert alert-danger");
    return Functions::back();
  }

}