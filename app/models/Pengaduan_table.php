<?php

class Pengaduan_Table {

  private $table = 'pengaduan';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`tgl_pengaduan`, `nik`, `judul_laporan`, `isi_laporan`, `foto`, `status`) VALUES (:tgl_pengaduan, :nik, :judul_laporan, :isi_laporan, :foto, :status)");
    $this->db->bind("tgl_pengaduan", date("Y-m-d"));
    $this->db->bind("nik", $_POST['nik']);
    $this->db->bind("judul_laporan", $_POST['subject']);
    $this->db->bind("isi_laporan", $_POST['keterangan']);
    $this->db->bind("foto", $_FILES['image']['name']);
    $this->db->bind("status", "0");
    return $this->db->rowCount();
  }

  public function getBy() {
    if($_POST['order'] === "Baru") {
      $this->db->query("SELECT * FROM {$this->table}, `masyarakat` WHERE {$this->table}.`nik` = `masyarakat`.`nik` && {$this->table}.`nik` = :nik && `nama` = :nama ORDER BY `tgl_pengaduan` ASC");
    } else if ($_POST['order'] === "Lama") {
      $this->db->query("SELECT * FROM {$this->table}, `masyarakat` WHERE {$this->table}.`nik` = `masyarakat`.`nik` && {$this->table}.`nik` = :nik && `nama` = :nama ORDER BY `tgl_pengaduan` DESC");
    } else {
      $this->db->query("SELECT * FROM {$this->table}, `masyarakat` WHERE {$this->table}.`nik` = `masyarakat`.`nik` && {$this->table}.`nik` = :nik && `nama` = :nama ORDER BY `status`");
    }
    $this->db->bind("nik", intval($_POST['nik']));
    $this->db->bind("nama", $_POST['nama']);
    return $this->db->resultAll();
  }
}