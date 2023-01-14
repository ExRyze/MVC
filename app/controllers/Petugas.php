<?php

class Petugas extends Controllers {

  public function index() {
    Middleware::level(('admin' || 'petugas'));
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

  public function entri() {
    Middleware::level(('admin' || 'petugas'));
    $data['daftar_siswa'] = $this->model('Siswa')->list();
    return $this->view('petugas/entri', $data);
  }

  public function pembayaran() {
    Middleware::level(('admin' || 'petugas'));
    if($this->model('Pembayaran')->store()) {Flasher::setFlasher("Pembayaran berhasil", "alert alert-success"); return Functions::back();}
    Flasher::setFlasher("Terhadi suatu kesalahan...", "alert alert-danger"); return Functions::back();
  }

  public function tabelsiswa() {
    Middleware::level('admin' || 'petugas');
    $data['siswa'] = $this->model('Siswa')->getAll();
    return $this->view('petugas/tabelsiswa', $data);
  }

}