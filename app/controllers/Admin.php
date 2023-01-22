<?php

class Admin extends Controller {

  public function index() {
    Middleware::auth();
    $data['page'] = "Admin Home";
    return $this->view('index', $data);
  }

  public function login() {
    Middleware::auth(false);
    $data['page'] = "Admin Login";
    return $this->view('admin/login', $data);
  }

  public function clogin() {
    Middleware::auth(false);
    if(!isset($_POST)) {
      Flasher::setMessage("Please input data in form!", "alert-warning");
      return header("Location: ".BASE_URL."/admin/login");
    }
    if($this->model('Petugas')->validate()) {
      $_SESSION['petugas'] = $this->model('Petugas')->login();
      return header("Location: ".BASE_URL."/admin");
    }
    Flasher::setMessage("Username of password wrong!", "alert-danger");
    return Functions::back();
  }

  public function logout() {
    Middleware::auth();
    session_destroy();
    return header("Location: ".BASE_URL."/admin/login");
  }

  public function laporan() {
    Middleware::auth();
    $data['page'] = "Pengaduan";
    if(!empty($_POST['nik']) && !empty($_POST['nama'])) {
      $data['laporan'] = $this->model('Pengaduan')->getBy();
      if(empty($data['laporan'])) {Flasher::setMessage("Data tidak ditemukan!", "alert-warning col-12");}
    } else {
      $data['laporan'] = $this->model('Pengaduan')->getAll();
      if(empty($data['laporan'])) {Flasher::setMessage("Tidak ada data!", "alert-warning col-12");}
    }
    return $this->view('laporan', $data);
  }

  public function petugas() {
    Middleware::auth();
    $data['page'] = "Tabel Petugas";
    $data['petugas'] = $this->model("Petugas")->getAll();
    return $this->view('admin/petugas', $data);
  }

  public function add() {
    Middleware::auth();
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
    Flasher::setMessage("Petugas berhasil ditambahkan!", "alert-success");
    return header("Location: ".BASE_URL."/admin/petugas");
  }

  public function edit() {
    Middleware::auth();
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
    Flasher::setMessage("Petugas berhasil ditambahkan!", "alert-success");
    return header("Location: ".BASE_URL."/admin/petugas");
  }

  public function delete() {
    Middleware::auth();
    $this->model("Petugas")->delete();
    Flasher::setMessage("Petugas berhasil dihapus!", "alert-success");
    return header("Location: ".BASE_URL."/admin/petugas");
  }
}