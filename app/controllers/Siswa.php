<?php

class Siswa extends Controllers {

  public function __construct() {
    Middleware::level("siswa");
  }

  public function index() {
    $data['bulan'] = ["Juli", "Agustus", "September", "Oktober", "November", "Desember", "Januari", "Februari", "Maret", "April", "Mei", "Juni"];
    $data['created'] = false;
    $data['siswa'] = $this->model('Siswa')->get($_SESSION['ExSPP']['user']['nisn']);
    $data['pembayaran'] = $this->model('pembayaran')->siswa($_SESSION['ExSPP']['user']['nisn'], $_SESSION['ExSPP']['user']['id_spp']);
    return $this->view('siswa/entri', $data);
  }

}