<?php

class Petugas extends Controller {

  public function __construct() {
    Middleware::auth();
  }

  public function index() {
    return header("Location: ".BASE_URL);
  }

  public function add() {
    if(strlen((string)$_POST['nama']) > 35 ) {
      Flasher::setMessage("Nama terlalu panjang!", "alert-warning");
      return Functions::back();}
    if(strlen((string)$_POST['username']) > 25 ) {
      Flasher::setMessage("Username terlalu panjang!", "alert-warning");
      return Functions::back();}
    if(!is_numeric($_POST['telp']) || strlen((string)$_POST['telp']) > 13) {
      Flasher::setMessage("Format Telepon salah!", "alert-warning");
      return Functions::back();}
    if($this->model("Petugas")->validateNama()) {
      Flasher::setMessage("Username telah digunakan!", "alert-warning");
      return Functions::back();}
    $this->model("Petugas")->store();
    Flasher::setMessage("Data petugas berhasil ditambahkan!", "alert-success");
    return header("Location: ".BASE_URL."/admin/petugas");
  }

  public function edit() {
    if(strlen((string)$_POST['nama']) > 35 ) {
      Flasher::setMessage("Nama terlalu panjang!", "alert-warning");
      return Functions::back();}
    if(strlen((string)$_POST['username']) > 25 ) {
      Flasher::setMessage("Username terlalu panjang!", "alert-warning");
      return Functions::back();}
    if(!is_numeric($_POST['telp']) || strlen((string)$_POST['telp']) > 13) {
      Flasher::setMessage("Format Telepon salah!", "alert-warning");
      return Functions::back();}
    if($this->model("Petugas")->validateNama() && !$this->model("Petugas")->validateEditNama()) {
      Flasher::setMessage("Username telah digunakan!", "alert-warning");
      return Functions::back();}
    $this->model("Petugas")->update();
    Flasher::setMessage("Data petugas berhasil diperbaharui!", "alert-success");
    return header("Location: ".BASE_URL."/admin/petugas");
  }

  public function delete() {
    $this->model("Petugas")->delete();
    Flasher::setMessage("Petugas berhasil dihapus!", "alert-success");
    return header("Location: ".BASE_URL."/admin/petugas");
  }

}