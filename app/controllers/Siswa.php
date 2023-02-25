<?php

class Siswa extends Controllers {

  public function __construct() {
    Middleware::level("siswa");
  }

  public function index() {
    $data['pembayaran'] = $this->model('Pembayaran')->getHistory();
    return $this->view('petugas/historypembayaran', $data);
  }

}