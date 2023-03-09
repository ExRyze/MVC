<?php

class Petugas extends Controller {

  public function index() {
    $data = [
      'page' => "Petugas - Home"
    ];
    return $this->view("petugas/index", $data);
  }

  public function tabel($tabel = "") {
    if(!file_exists("../app/views/petugas/tabel_".$tabel.".php")) {Functions::redirect();}
    $data = [
      'key' => $tabel,
      'page' => "Petugas - Tabel Kelas"
    ];
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