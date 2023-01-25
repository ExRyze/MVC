<?php

class Masyarakat extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function index() {
    return header("Location: ".BASE_URL);
  }

  public function add() {
    if(strlen((string)$_POST['nik']) != 16 ) {
      Flasher::setMessage("Format NIK salah!", "alert-warning");
      return Functions::back();}
    if(strlen((string)$_POST['nama']) > 35 ) {
      Flasher::setMessage("Nama terlalu panjang!", "alert-warning");
      return Functions::back();}
    if(!is_numeric($_POST['telp']) || strlen((string)$_POST['telp']) > 13) {
      Flasher::setMessage("Format Telepon salah!", "alert-warning");
      return Functions::back();}
    if($this->model("Masyarakat")->validateNIK()) {
      if(!$this->model("Masyarakat")->validateNama()) {
        Flasher::setMessage("Nama salah atau NIK telah dipakai orang lain!", "alert-warning");
        return Functions::back();
      }}
    else {
      $this->model("Masyarakat")->store();}
    Flasher::setMessage("Berhasil menambahkan data masyarakat!", "alert-success");
    return header("Location: ".BASE_URL."/admin/masyarakat");
  }

  public function edit() {
    if(strlen((string)$_POST['nik']) != 16 ) {
      Flasher::setMessage("Format NIK salah!", "alert-warning");
      return Functions::back();}
    if(strlen((string)$_POST['nama']) > 35 ) {
      Flasher::setMessage("Nama terlalu panjang!", "alert-warning");
      return Functions::back();}
    if(!is_numeric($_POST['telp']) || strlen((string)$_POST['telp']) > 13) {
      Flasher::setMessage("Format Telepon salah!", "alert-warning");
      return Functions::back();}
    $this->model("Masyarakat")->update();
    Flasher::setMessage("Data masyarakat berhasil diperbaharui!", "alert-success");
    return header("Location: ".BASE_URL."/admin/masyarakat");
  }

  public function delete() {
    $this->model("Masyarakat")->delete();
    Flasher::setMessage("Data masyarakat berhasil dihapus!", "alert-success");
    return header("Location: ".BASE_URL."/admin/masyarakat");
  }

}