<?php

class Pembayaran_table {

  private $table = 'pembayaran';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT {$this->table}.*, `siswa`.`nis`, `siswa`.`nama`, `petugas`.`username`, `spp`.* FROM {$this->table}, `petugas`, `siswa`, `spp` WHERE {$this->table}.`id_petugas` = `petugas`.`id_petugas` && {$this->table}.`nisn` = `siswa`.`nisn` && {$this->table}.`id_spp` = `siswa`.`id_spp` && `siswa`.`id_spp` = `spp`.`id_spp`");
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `id_pembayaran` = :id_pembayaran");
    $this->db->bind('id_pembayaran', $_POST['id_pembayaran']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`,  `jumlah_bayar`) VALUES (:id_petugas, :nisn, :tgl_bayar, :bulan_dibayar, :tahun_dibayar, :id_spp,  :jumlah_bayar)");
    $this->db->bind('id_petugas', $_POST['id_petugas']);
    $this->db->bind('nisn', $_POST['nisn']);
    $this->db->bind('tgl_bayar', date("Y-m-d"));
    $this->db->bind('bulan_dibayar', date("F"));
    $this->db->bind('tahun_dibayar', date("Y"));
    $this->db->bind('id_spp', $_POST['id_spp']);
    $this->db->bind('jumlah_bayar', $_POST['jumlah_bayar']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->table} SET `jumlah_bayar` = :jumlah_bayar WHERE `id_pembayaran` = :id_pembayaran");
    $this->db->bind('id_pembayaran', $_POST['id_pembayaran']);
    $this->db->bind('jumlah_bayar', $_POST['jumlah_bayar']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE FROM {$this->table} WHERE `id_pembayaran` = :id_pembayaran");
    $this->db->bind('id_pembayaran', $_POST['id_pembayaran']);
    return $this->db->rowCount();
  }
}