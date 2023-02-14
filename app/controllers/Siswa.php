<?php

class Siswa extends Controllers {

  public function __construct() {
    Middleware::level("siswa");
  }

  public function index() {
    return $this->view('siswa/index');
  }

  public function historypembayaran() {
    $data['pembayaran'] = $this->model('Pembayaran')->getHistory();
    return $this->view('petugas/historypembayaran', $data);
  }

}