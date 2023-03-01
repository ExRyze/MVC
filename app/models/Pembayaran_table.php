<?php

class Pembayaran_table {

  private $table = 'pembayaran';
  private $siswa = 'siswa';
  private $petugas = 'petugas';
  private $spp = 'spp';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT {$this->table}.*, {$this->siswa}.`nis`, {$this->siswa}.`nama`, {$this->petugas}.`username`, {$this->spp}.* FROM {$this->table}, {$this->petugas}, {$this->siswa}, {$this->spp} WHERE {$this->table}.`id_petugas` = {$this->petugas}.`id_petugas` && {$this->table}.`nisn` = {$this->siswa}.`nisn` && {$this->table}.`id_spp` = {$this->siswa}.`id_spp` && {$this->siswa}.`id_spp` = {$this->spp}.`id_spp`");
    return $this->db->resultAll();
  }

  public function getHistory() {
    $this->db->query("SELECT {$this->table}.*, {$this->siswa}.`nis`, {$this->siswa}.`nama`, {$this->petugas}.`username`, {$this->spp}.* FROM {$this->table} 
    LEFT JOIN {$this->petugas} ON {$this->table}.`id_petugas` = {$this->petugas}.`id_petugas`
    LEFT JOIN {$this->siswa} ON {$this->table}.`nisn` = {$this->siswa}.`nisn`
    LEFT JOIN {$this->spp} ON {$this->table}.`id_spp` = {$this->spp}.`id_spp`
    WHERE {$this->petugas}.`id_petugas` = :id");
    $this->db->bind('id', $_SESSION['ExSPP']['user']['id_petugas']);
    return $this->db->resultAll();
  }

  public function siswa($nisn, $spp) {
    $this->db->query("SELECT * FROM {$this->table} WHERE `nisn` = :nisn && `id_spp` = :spp ");
    $this->db->bind('nisn', $nisn);
    $this->db->bind('spp', $spp);
    return $this->db->resultAll();
  }

  public function laporan() {
    $this->db->query("SELECT * FROM {$this->table} LEFT JOIN {$this->spp} ON {$this->table}.`id_spp` = {$this->spp}.`id_spp`");
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `id_pembayaran` = :id_pembayaran");
    $this->db->bind('id_pembayaran', $_POST['id_pembayaran']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`,  `jumlah_bayar`) VALUES (:id_petugas, :nisn, :tgl_bayar, :bulan_dibayar, :tahun_dibayar, :id_spp,  :jumlah_bayar)");
    $this->db->bind('id_petugas', $_SESSION['ExSPP']['user']['id_petugas']);
    $this->db->bind('nisn', $_POST['nisn']);
    $this->db->bind('tgl_bayar', date("Y-m-d"));
    $this->db->bind('bulan_dibayar', $_POST['bulan']);
    $this->db->bind('tahun_dibayar', $_POST['tahun']);
    $this->db->bind('id_spp', $_POST['id_spp']);
    $this->db->bind('jumlah_bayar', $_POST['jumlah']);
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