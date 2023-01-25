<?php

class Tanggapan extends Controller {

  public function __construct() {
    Middleware::auth();
    if(!isset($_SESSION['tanggapan'])) {return Functions::back();}
  }

  public function index() {
    return header("Location: ".BASE_URL);
  }

  public function add($status) {
    $this->model("Tanggapan")->store();
    $this->model("Pengaduan")->status($status);
    unset($_SESSION['tanggapan']);
    Flasher::setMessage("Tanggapan berhasil dibuat!", "alert-success");
    return header("Location: ".BASE_URL."/admin/laporan");
  }

  public function edit($status) {
    $this->model("Tanggapan")->update();
    $this->model("Pengaduan")->status($status);
    unset($_SESSION['tanggapan']);
    Flasher::setMessage("Tanggapan berhasil diupdate!", "alert-success");
    return header("Location: ".BASE_URL."/admin/laporan");
  }

}