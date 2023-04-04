<?php

class Siswa extends Controller {

    public $data;

    public function __construct() {
        Middleware::role("siswa");
    }

    public function index() {
        $this->data['page'] = "Siswa - Home";
        return $this->view("siswa/index", $this->data);
    }

    public function history() {
        $this->data['page'] = "Siswa - History Transaksi";
        $this->data['tabel'] = $this->model("transaksi")->getSiswa();
        return $this->view("siswa/history", $this->data);
    }

    public function profile() {
        $this->data['page'] = "Siswa - Profile";
        $this->data['siswa'] = $this->model("siswa")->get($_SESSION['spp']['nis']);
        $this->data['transaksi'] = $this->model("transaksi")->get($_SESSION['spp']['nis']);
        $this->data['bulan'] = ["Juli", "Agustus", "September", "Oktober", "November", "Desember", "Januari", "Februari", "Maret", "April", "Mei", "Juni"];
        return $this->view("siswa/profile", $this->data);
    }
}