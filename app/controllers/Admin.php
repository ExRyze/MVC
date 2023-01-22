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
    session_destroy();
    return header("Location: ".BASE_URL."/admin/login");
  }

  public function laporan() {
    $data['page'] = "Pengaduan Masyarakat";
    if(!empty($_POST['nik']) && !empty($_POST['nama'])) {
      $data['laporan'] = $this->model('Pengaduan')->getBy();
      if(empty($data['laporan'])) {Flasher::setMessage("Data tidak ditemukan!", "alert-warning col-12");}
    } else {
      $data['laporan'] = $this->model('Pengaduan')->getAll();
      if(empty($data['laporan'])) {Flasher::setMessage("Tidak ada data!", "alert-warning col-12");}
    }
    return $this->view('laporan', $data);
  }
}