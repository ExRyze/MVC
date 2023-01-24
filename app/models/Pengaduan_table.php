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

  public function getAll() {
    if (!empty($_POST) && $_POST['status'] === "0") {
      $this->db->query("SELECT {$this->table}.*, `masyarakat`.*, `tanggapan`.`id_tanggapan`, `tanggapan`.`tgl_tanggapan`, `tanggapan`.`tanggapan`, `tanggapan`.`id_petugas` FROM {$this->table}, `masyarakat` LEFT OUTER JOIN `tanggapan` ON `id_pengaduan` WHERE {$this->table}.`nik` = `masyarakat`.`nik` && `status` = :status ORDER BY `tgl_pengaduan` DESC");
    } else if (!empty($_POST) && $_POST['status'] === "proses") {
      $this->db->query("SELECT {$this->table}.*, `masyarakat`.*, `tanggapan`.`id_tanggapan`, `tanggapan`.`tgl_tanggapan`, `tanggapan`.`tanggapan`, `tanggapan`.`id_petugas` FROM {$this->table}, `masyarakat` LEFT OUTER JOIN `tanggapan` ON `id_pengaduan` WHERE {$this->table}.`nik` = `masyarakat`.`nik` && `status` = :status ORDER BY `tgl_pengaduan` DESC");
    } else if (!empty($_POST) && $_POST['status'] === "selesai") {
      $this->db->query("SELECT {$this->table}.*, `masyarakat`.*, `tanggapan`.`id_tanggapan`, `tanggapan`.`tgl_tanggapan`, `tanggapan`.`tanggapan`, `tanggapan`.`id_petugas` FROM {$this->table}, `masyarakat` LEFT OUTER JOIN `tanggapan` ON `id_pengaduan` WHERE {$this->table}.`nik` = `masyarakat`.`nik` && `status` = :status ORDER BY `tgl_pengaduan` DESC");
    } else if (!empty($_POST) && $_POST['status'] === "ditolak") {
      $this->db->query("SELECT {$this->table}.*, `masyarakat`.*, `tanggapan`.`id_tanggapan`, `tanggapan`.`tgl_tanggapan`, `tanggapan`.`tanggapan`, `tanggapan`.`id_petugas` FROM {$this->table}, `masyarakat` LEFT OUTER JOIN `tanggapan` ON `id_pengaduan` WHERE {$this->table}.`nik` = `masyarakat`.`nik` && `status` = :status ORDER BY `tgl_pengaduan` DESC");
    } else {
      $this->db->query("SELECT {$this->table}.*, `masyarakat`.*, `tanggapan`.`id_tanggapan`, `tanggapan`.`tgl_tanggapan`, `tanggapan`.`tanggapan`, `tanggapan`.`id_petugas` FROM {$this->table}, `masyarakat` LEFT OUTER JOIN `tanggapan` ON `id_pengaduan` WHERE {$this->table}.`nik` = `masyarakat`.`nik` ORDER BY `tgl_pengaduan` DESC");
    }
    if(!empty($_POST) && $_POST['status'] != "") {
      $this->db->bind("status", $_POST['status']);
    }
    return $this->db->resultAll();
  }

  public function getBy() {
    if ($_POST['status'] === "0") {
      $this->db->query("SELECT {$this->table}.*, `masyarakat`.*, `tanggapan`.`id_tanggapan`, `tanggapan`.`tgl_tanggapan`, `tanggapan`.`tanggapan`, `tanggapan`.`id_petugas` FROM {$this->table}, `masyarakat` LEFT OUTER JOIN `tanggapan` ON `id_pengaduan` WHERE {$this->table}.`nik` = `masyarakat`.`nik` && {$this->table}.`nik` = :nik && `nama` = :nama && `status` = :status ORDER BY `tgl_pengaduan` DESC");
    } else if ($_POST['status'] === "proses") {
      $this->db->query("SELECT {$this->table}.*, `masyarakat`.*, `tanggapan`.`id_tanggapan`, `tanggapan`.`tgl_tanggapan`, `tanggapan`.`tanggapan`, `tanggapan`.`id_petugas` FROM {$this->table}, `masyarakat` LEFT OUTER JOIN `tanggapan` ON `id_pengaduan` WHERE {$this->table}.`nik` = `masyarakat`.`nik` && {$this->table}.`nik` = :nik && `nama` = :nama && `status` = :status ORDER BY `tgl_pengaduan` DESC");
    } else if ($_POST['status'] === "selesai") {
      $this->db->query("SELECT {$this->table}.*, `masyarakat`.*, `tanggapan`.`id_tanggapan`, `tanggapan`.`tgl_tanggapan`, `tanggapan`.`tanggapan`, `tanggapan`.`id_petugas` FROM {$this->table}, `masyarakat` LEFT OUTER JOIN `tanggapan` ON `id_pengaduan` WHERE {$this->table}.`nik` = `masyarakat`.`nik` && {$this->table}.`nik` = :nik && `nama` = :nama && `status` = :status ORDER BY `tgl_pengaduan` DESC");
    } else if ($_POST['status'] === "ditolak") {
      $this->db->query("SELECT {$this->table}.*, `masyarakat`.*, `tanggapan`.`id_tanggapan`, `tanggapan`.`tgl_tanggapan`, `tanggapan`.`tanggapan`, `tanggapan`.`id_petugas` FROM {$this->table}, `masyarakat` LEFT OUTER JOIN `tanggapan` ON `id_pengaduan` WHERE {$this->table}.`nik` = `masyarakat`.`nik` && {$this->table}.`nik` = :nik && `nama` = :nama && `status` = :status ORDER BY `tgl_pengaduan` DESC");
    } else {
      $this->db->query("SELECT {$this->table}.*, `masyarakat`.*, `tanggapan`.`id_tanggapan`, `tanggapan`.`tgl_tanggapan`, `tanggapan`.`tanggapan`, `tanggapan`.`id_petugas` FROM {$this->table}, `masyarakat` LEFT OUTER JOIN `tanggapan` ON `id_pengaduan` WHERE {$this->table}.`nik` = `masyarakat`.`nik` && {$this->table}.`nik` = :nik && `nama` = :nama ORDER BY `tgl_pengaduan` DESC");
    }
    $this->db->bind("nik", intval($_POST['nik']));
    $this->db->bind("nama", $_POST['nama']);
    if($_POST['status'] != "") {
      $this->db->bind("status", $_POST['status']);
    }
    return $this->db->resultAll();
  }

  public function status($status) {
    $this->db->query("UPDATE {$this->table} SET `status` = :status WHERE `id_pengaduan` = :id_pengaduan");
    $this->db->bind("status", $status);
    $this->db->bind("id_pengaduan", $_SESSION['tanggapan']['id_pengaduan']);
    return $this->db->rowCount();
  }

}