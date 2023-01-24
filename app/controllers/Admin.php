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

  public function masyarakat() {
    Middleware::auth();
    $data['page'] = "Tabel Masyarakat";
    $data['masyarakat'] = $this->model("Masyarakat")->getAll();
    return $this->view('admin/masyarakat', $data);
  }

  public function laporan() {
    Middleware::auth();
    $data['page'] = "Pengaduan";
    if(!empty($_POST['submit']) && empty($_POST['id_tanggapan'])) {
      $_SESSION['tanggapan'] = ["id_pengaduan" => $_POST['id_pengaduan'], "tanggapan" => $_POST['tanggapan']];
      switch ($_POST['submit']) {
        case 'Tolak':
          return header("Location: ".BASE_URL."/tanggapan/add/ditolak");
          break;
        case 'Proses':
          return header("Location: ".BASE_URL."/tanggapan/add/proses");
          break;
        case 'Selesai':
          return header("Location: ".BASE_URL."/tanggapan/add/selesai");
          break;
        case 'Belum ditindaklanjuti':
          return header("Location: ".BASE_URL."/tanggapan/add/0");
          break;
      }
    } else if (!empty($_POST['submit']) && !empty($_POST['id_tanggapan'])) {
      $_SESSION['tanggapan'] = ["id" => $_POST['id_tanggapan'], "id_pengaduan" => $_POST['id_pengaduan'], "tanggapan" => $_POST['tanggapan']];
      switch ($_POST['submit']) {
        case 'Tolak':
          return header("Location: ".BASE_URL."/tanggapan/edit/ditolak");
          break;
        case 'Proses':
          return header("Location: ".BASE_URL."/tanggapan/edit/proses");
          break;
        case 'Selesai':
          return header("Location: ".BASE_URL."/tanggapan/edit/selesai");
          break;
        case 'Belum ditindaklanjuti':
          return header("Location: ".BASE_URL."/tanggapan/edit/0");
          break;
      }
    }
    if(!empty($_POST['nik']) && !empty($_POST['nama'])) {
      $data['laporan'] = $this->model('Pengaduan')->getBy();
      if(empty($data['laporan'])) {Flasher::setMessage("Data tidak ditemukan!", "alert-warning col-12");}}
    else {
      $data['laporan'] = $this->model('Pengaduan')->getAll();
      if(empty($data['laporan'])) {Flasher::setMessage("Tidak ada data!", "alert-warning col-12");}}
    return $this->view('laporan', $data);
  }

  public function petugas() {
    Middleware::auth();
    $data['page'] = "Tabel Petugas";
    $data['petugas'] = $this->model("Petugas")->getAll();
    return $this->view('admin/petugas', $data);
  }

}