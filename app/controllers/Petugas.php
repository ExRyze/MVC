<?php

class Petugas extends Controllers {

  public function index() {
    Middleware::level(('admin' || 'petugas'));
    $data['count_siswa'] = $this->model('Siswa')->count();
    $data['count_petugas'] = $this->model('Petugas')->count();
    $data['count_kelas'] = $this->model('Kelas')->count();
    return  $this->view('petugas/index', $data);
  }

  public function entri($nis = []) {
    Middleware::level(('admin' || 'petugas'));
    if(empty($nis)) {
      $data['siswa'] = $this->model('Siswa')->getAll();
      return $this->view('petugas/entrisearch', $data);
    } else {
      $data['bulan'] = [
        "Juli", "Agustus", "September",
        "Oktober", "November", "Desember", 
        "Januari", "Februari", "Maret", 
        "April", "Mei", "Juni"
      ];
      $data['siswa'] = $this->model('Siswa')->get($nis);
      $data['pembayaran'] = $this->model('pembayaran')->siswa($data['siswa']['nisn'], $data['siswa']['id_spp']);
      return $this->view('petugas/entri', $data);
    }
  }

  public function pembayaran() {
    Middleware::level(('admin' || 'petugas'));
    if($this->model('Pembayaran')->store()) {Flasher::setFlasher("Pembayaran berhasil", "alert alert-success"); return Functions::back();}
    Flasher::setFlasher("Terhadi suatu kesalahan...", "alert alert-danger"); return Functions::back();
  }

  public function historypembayaran() {
    Middleware::level(('admin' || 'petugas'));
    $data['pembayaran'] = $this->model('Pembayaran')->getHistoryEntri();
    return $this->view('petugas/historypembayaran', $data);
  }

  public function tabelspp() {
    Middleware::level('admin');
    $data['SPP'] = $this->model('Spp')->getAll();
    return $this->view('petugas/tabelspp', $data);
  }

  public function tabelsiswa() {
    Middleware::level('admin');
    $data['siswa'] = $this->model('Siswa')->getAll();
    $data['kelas'] = $this->model('Kelas')->getAll();
    $data['spp'] = $this->model('Spp')->getAll();
    return $this->view('petugas/tabelsiswa', $data);
  }

  public function tabelpetugas() {
    Middleware::level('admin');
    $data['petugas'] = $this->model('Petugas')->getAll();
    return $this->view('petugas/tabelpetugas', $data);
  }

  public function tabelkelas() {
    Middleware::level('admin');
    $data['kelas'] = $this->model('Kelas')->getAll();
    return $this->view('petugas/tabelkelas', $data);
  }

  public function tabelpembayaran() {
    Middleware::level('admin');
    $data['pembayaran'] = $this->model('Pembayaran')->getAll();
    return $this->view('petugas/tabelpembayaran', $data);
  }

  public function add($key) {
    Middleware::level('admin');
    if(!$this->model($key)->validate()) {
      $this->model($key)->store();
      Flasher::setFlasher("Data berhasi ditambahkan", "alert alert-success"); return Functions::back();}
    Flasher::setFlasher("Data sudah ada...", "alert alert-danger"); return Functions::back();
  }

  public function edit($key) {
    Middleware::level('admin');
    if($this->model($key)->validate()) {
      $this->model($key)->update();
      Flasher::setFlasher("Data berhasi diperbaharui", "alert alert-success"); return Functions::back();}
    Flasher::setFlasher("Terjadi suatu kesalahan...", "alert alert-danger"); return Functions::back();
  }

  public function delete($key) {
    Middleware::level('admin');
    if($this->model($key)->validate()) {
      $this->model($key)->delete();
      Flasher::setFlasher("Data berhasi dihapus", "alert alert-success"); return Functions::back();}
    Flasher::setFlasher("Terjadi suatu kesalahan...", "alert alert-danger"); return Functions::back();
  }

}