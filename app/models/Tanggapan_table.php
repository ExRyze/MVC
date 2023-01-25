<?php

class Tanggapan_Table {

  private $table = "tanggapan";
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES (:id_pengaduan, :tgl_tanggapan, :tanggapan, :id_petugas)");
    $this->db->bind("id_pengaduan", $_SESSION['tanggapan']['id_pengaduan']);
    $this->db->bind("tgl_tanggapan", date("Y-m-d h:i:s"));
    $this->db->bind("tanggapan", $_SESSION['tanggapan']['tanggapan']);
    $this->db->bind("id_petugas", $_SESSION['petugas']['id_petugas']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->table} SET `tgl_tanggapan` = :tgl_tanggapan, `tanggapan` = :tanggapan, `id_petugas` = :id_petugas WHERE `id_tanggapan` = :id_tanggapan");
    $this->db->bind("id_tanggapan", $_SESSION['tanggapan']['id']);
    $this->db->bind("tgl_tanggapan", date("Y-m-d h:i:s"));
    $this->db->bind("tanggapan", $_SESSION['tanggapan']['tanggapan']);
    $this->db->bind("id_petugas", $_SESSION['petugas']['id_petugas']);
    return $this->db->rowCount();
  }

}