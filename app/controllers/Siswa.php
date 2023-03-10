<?php

class Siswa extends Controller {

  public function __construct() {
    Middleware::role("siswa");
  }

  public function index() {
    $data['page'] = "Siswa - Home";
    $data['created'] = false;
    $data['transaksi'] = $this->model("transaksi")->get($_SESSION['sppsch2']['nis']);
    $data['bulan'] = ["Juli", "Agustus", "September", "Oktober", "November", "Desember", "January", "Februari", "Maret", "April", "Mei", "Juni"];
    return $this->view("siswa/index", $data);
  }

  public function history() {
    $data['page'] = "Siswa - History";
    $data['tabel'] = $this->model("transaksi")->getSiswa();
    return $this->view("siswa/history", $data);
  }
  
}