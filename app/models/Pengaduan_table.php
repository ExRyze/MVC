<?php

class Pengaduan_Table {

  private $table = 'pengaduan';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`tgl_pengaduan`, `nik`, `judul_laporan`, `isi_laporan`, `foto`, `status`) VALUES (:tgl_pengaduan, :nik, :judul_laporan, :isi_laporan, :foto, :status)");
    $this->db->bind("tgl_pengaduan", date("Y-m-d h:i:s"));
    $this->db->bind("nik", $_POST['nik']);
    $this->db->bind("judul_laporan", $_POST['subject']);
    $this->db->bind("isi_laporan", $_POST['keterangan']);
    $this->db->bind("foto", $_FILES['image']['name']);
    $this->db->bind("status", "0");
    return $this->db->rowCount();
  }

  public function getAll() {
      $this->db->query("SELECT `pengaduan`.*, `masyarakat`.`nama`, `masyarakat`.`telp`, `tanggapan`.`id_tanggapan`, `tanggapan`.`tgl_tanggapan`, `tanggapan`.`tanggapan`, `tanggapan`.`id_petugas`, `petugas`.`username` AS `petugas_username`, `petugas`.`telp` AS `petugas_telp` FROM `pengaduan` LEFT OUTER JOIN `masyarakat` ON `masyarakat`.`nik` = `pengaduan`.`nik` LEFT OUTER JOIN `tanggapan` ON `pengaduan`.`id_pengaduan` = `tanggapan`.`id_pengaduan` LEFT OUTER JOIN `petugas` ON `tanggapan`.`id_petugas` = `petugas`.`id_petugas` WHERE `status` = :status ORDER BY `tgl_pengaduan` DESC");
    if(!empty($_POST) && $_POST['status'] != "") {
      $this->db->bind("status", $_POST['status']);
    } else {$this->db->bind("status", "0");}
    return $this->db->resultAll();
  }

  public function getBy() {
      $this->db->query("SELECT `pengaduan`.*, `masyarakat`.`nama`, `masyarakat`.`telp`, `tanggapan`.`id_tanggapan`, `tanggapan`.`tgl_tanggapan`, `tanggapan`.`tanggapan`, `tanggapan`.`id_petugas`, `petugas`.`username` AS `petugas_username`, `petugas`.`telp` AS `petugas_telp` FROM `pengaduan` LEFT OUTER JOIN `masyarakat` ON `masyarakat`.`nik` = `pengaduan`.`nik` LEFT OUTER JOIN `tanggapan` ON `pengaduan`.`id_pengaduan` = `tanggapan`.`id_pengaduan` LEFT OUTER JOIN `petugas` ON `tanggapan`.`id_petugas` = `petugas`.`id_petugas` WHERE `pengaduan`.`nik` = :nik && `masyarakat`.`nama` = :nama && `pengaduan`.`status` = :status ORDER BY `tgl_pengaduan` DESC");
    $this->db->bind("nik", intval($_POST['nik']));
    $this->db->bind("nama", $_POST['nama']);
    if($_POST['status'] != "") {
      $this->db->bind("status", $_POST['status']);
    } else {$this->db->bind("status", "0");}
    return $this->db->resultAll();
  }

  public function status($status) {
    $this->db->query("UPDATE {$this->table} SET `status` = :status WHERE `id_pengaduan` = :id_pengaduan");
    $this->db->bind("status", $status);
    $this->db->bind("id_pengaduan", $_SESSION['tanggapan']['id_pengaduan']);
    return $this->db->rowCount();
  }

}