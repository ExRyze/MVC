<?php

class Pengaduan_Table {

  private $table = 'pengaduan';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES (:tgl_pengaduan, :nik, :isi_laporan, :foto, :status)");
    $this->db->bind("tgl_pengaduan", date("Y-m-d"));
    $this->db->bind("nik", $_POST['nik']);
    $this->db->bind("isi_laporan", $_POST['keterangan']);
    $this->db->bind("foto", $_FILES['image']['name']);
    $this->db->bind("status", "0");
    return $this->db->rowCount();
  }
}