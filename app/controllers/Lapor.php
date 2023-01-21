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
    if(!is_numeric($_POST['telp'])) {
      Flasher::setMessage("Format Telepon salah!", "alert-warning");
      return Functions::back();}
    if(!str_contains($_FILES['image']['type'], "image/")) {
      Flasher::setMessage("File anda bukan image!", "alert-warning");
      return Functions::back();}
    if($_FILES['image']['size'] > 1000000) {
      Flasher::setMessage("Size file anda terlalu besar!", "alert-warning");
      return Functions::back();}
    if($this->model("Masyarakat")->validateNIK()) {
      if(!$this->model("Masyarakat")->validateName()) {
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
    return Functions::back();
  }
  
}