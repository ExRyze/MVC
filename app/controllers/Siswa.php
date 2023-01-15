<?php

class Siswa extends Controllers {

  public function index() {
    return $this->view('siswa/index');
  }

  public function login() {
    return $this->view('siswa/login');
  }

  public function clogin() {
    if($this->model('Siswa')->validate()) {
      $_SESSION['user'] = $this->model('Siswa')->login();
      Flasher::setFlasher("Berhasil Login", "alert alert-success");
      return header("Location: ".BASE_URL.'/siswa');
    }
    Flasher::setFlasher("NISN tidak ditemukan...", "alert alert-danger");
    return Functions::back();
  }

  public function historypembayaran() {
    $data['pembayaran'] = $this->model('Pembayaran')->getHistory();
    return $this->view('petugas/historypembayaran', $data);
  }

}