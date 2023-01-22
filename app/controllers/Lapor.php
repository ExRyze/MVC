<?php

class Lapor extends Controller {

  public function __construct() {
    Middleware::auth(false);
  }

  public function index() {
    $data['page'] = "Lapor Pengaduan";
    return $this->view('lapor');
  }

  public function store() {
    $_POST['nik'] = intval($_POST['nik']);
    if(strlen((string)$_POST['nik']) != 16 ) {
      Flasher::setMessage("Format NIK salah!", "alert-warning");
      return Functions::back();}
    if(strlen((string)$_POST['nama']) > 35 ) {
      Flasher::setMessage("Nama terlalu panjang!", "alert-warning");
      return Functions::back();}
    if(strlen((string)$_POST['subject']) > 125 ) {
      Flasher::setMessage("Subject terlalu panjang!", "alert-warning");
      return Functions::back();}
    if(!is_numeric($_POST['telp']) || strlen((string)$_POST['subject']) > 13) {
      Flasher::setMessage("Format Telepon salah!", "alert-warning");
      return Functions::back();}
    if(!str_contains($_FILES['image']['type'], "image/")) {
      Flasher::setMessage("File anda bukan image!", "alert-warning");
      return Functions::back();}
    if($_FILES['image']['size'] > 1000000) {
      Flasher::setMessage("Size file anda terlalu besar!", "alert-warning");
      return Functions::back();}
    if($this->model("Masyarakat")->validateNIK()) {
      if(!$this->model("Masyarakat")->validateNama()) {
        Flasher::setMessage("Nama salah atau NIK telah dipakai orang lain!", "alert-warning");
        return Functions::back();
      }}
    else {
      $this->model("Masyarakat")->store();}
    $name = explode(".", $_FILES['image']['name']);
    $name[0] = hash("md5", $name[0]).random_int(0, 100);
    $_FILES['image']['name'] = implode(".", $name);
    move_uploaded_file($_FILES['image']['tmp_name'], 'img/laporan/'.$_FILES['image']['name']);
    $this->model("Pengaduan")->store();
    return header("Location: ".BASE_URL."/lapor");
  }

  public function search() {
    $data['page'] = "Cari Pengaduan";
    if(isset($_POST['nik'])) {
      $data['laporan'] = $this->model('Pengaduan')->getBy();
      if(empty($data['laporan'])) {Flasher::setMessage("Data tidak ditemukan", "alert-warning col-12");}
    }
    return $this->view('laporan', $data);
  }
  
}