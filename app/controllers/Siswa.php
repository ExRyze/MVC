<?php

class Siswa extends Controller {

  public function __construct() {
    Middleware::role("siswa");
  }

  public function index() {
    $data['page'] = "Siswa - Home";
    $data['bulan'] = ["Juli", "Agustus", "September", "Oktober", "November", "Desember", "January", "Februari", "Maret", "April", "Mei", "Juni"];
    return $this->view("siswa/index", $data);
  }

  public function history() {
    $data['page'] = "Siswa - History";
    return $this->view("siswa/history", $data);
  }
  
}