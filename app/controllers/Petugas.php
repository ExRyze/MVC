<?php

class Petugas extends Controllers {

  public function index() {
    $data['count_siswa'] = $this->model('Siswa')->count();
    $data['count_petugas'] = $this->model('Petugas')->count();
    $data['count_kelas'] = $this->model('Kelas')->count();
    return  $this->view('petugas/index', $data);
  }

  public function login() {
    return $this->view('petugas/login');
  }

  public function clogin() {
    if($this->model('Petugas')->validate()) {
      $_SESSION['user'] = $this->model('Petugas')->login();
      Flasher::setFlasher("Berhasil Login", "alert alert-success");
      return header("Location: ".BASE_URL."/petugas");
    }
    Flasher::setFlasher("Terjadi kesalahan!", "alert alert-danger");
    return Functions::back();
  }

}