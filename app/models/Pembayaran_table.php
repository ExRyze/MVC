<?php

class Pembayaran_table {

  private $table = 'pembayaran';
  private $db;

  public function __construct() {
    $this->db = new Database;
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
}