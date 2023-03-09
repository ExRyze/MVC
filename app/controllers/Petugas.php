<?php

class Petugas extends Controller {

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
    return $this->view("petugas/tabel_".$tabel, $data);
  }
}