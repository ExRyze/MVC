<?php

class Petugas extends Controller {

  public function __construct() {
    Middleware::auth(("petugas" || "admin"));
  }

  public function index() {
    $data['page'] = "Petugas - Home";
    return $this->view("petugas/index", $data);
  }

  public function entri($nis = null) {
    $data['page'] = "Petugas - Entri";
    if(!is_null($nis)) {
      $data['bulan'] = ["Juli", "Agustus", "September", "Oktober", "November", "Desember", "January", "Februari", "Maret", "April", "Mei", "Juni"];
      return $this->view("petugas/entri", $data);
    }
    return $this->view("petugas/entrisearch", $data);
  }

  public function history() {
    $data['page'] = "Petugas - History";
    return $this->view("petugas/history", $data);
  }

  public function tabel($tabel = "") {
    if(!file_exists("../app/views/petugas/tabel_".$tabel.".php")) {Functions::redirect();}
    $data['key'] = $tabel;
    $data['page'] = "Petugas - Tabel ".$tabel;
    if($tabel === "kelas") {$data['kelas'] = [
      "Audio Video", 
      "Multimedia",
      "Rekayasa Perangkat Lunak", 
      "Teknik Komputer Jaringan",  
      "Teknik Pendingin dan Tata Udara"
    ];}
    $data['tabel'] = $this->model($tabel)->getAll();
    return $this->view("petugas/tabel_".$tabel, $data);
  }

  public function store($tabel = "") {
    if(!file_exists("../app/views/petugas/tabel_".$tabel.".php")) {Functions::redirect();}
    if(!$this->model($tabel)->validate()) {
      if($tabel === "petugas" || $tabel === "siswa") {$this->model("pengguna")->create();}
      $this->model($tabel)->create();
      Flasher::setMessage("Data berhasil ditambahkan...", "success");
      return Functions::redirect("petugas/tabel/".$tabel);
    } 
    Flasher::setMessage("Data sudah ada atau terjadi suatu kesalahan...", "warning");
    return Functions::back();
  }

  public function edit($tabel = "") {
    if(!file_exists("../app/views/petugas/tabel_".$tabel.".php")) {Functions::redirect();}
    if($this->model($tabel)->update()) {
      Flasher::setMessage("Data berhasil diperbaharui...", "success");
      return Functions::redirect("petugas/tabel/".$tabel);
    } 
    Flasher::setMessage("Data tidak ditemukan atau terjadi suatu kesalahan...", "warning");
    return Functions::back();
  }

  public function remove($tabel = "") {
    if(!file_exists("../app/views/petugas/tabel_".$tabel.".php")) {Functions::redirect();}
    if($this->model($tabel)->delete()) {
      Flasher::setMessage("Data berhasil dihapus...", "success");
      return Functions::redirect("petugas/tabel/".$tabel);
    } 
    Flasher::setMessage("Data tidak ditemukan atau terjadi suatu kesalahan...", "warning");
    return Functions::back();
  }

}