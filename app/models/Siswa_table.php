<?php

class Siswa_table {

  private $table = 'siswa';
  private $kelas = 'kelas';
  private $spp = 'spp';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function get($nis) {
    $this->db->query("SELECT * FROM {$this->table}, {$this->kelas}, {$this->spp} WHERE {$this->table}.`id_kelas` = {$this->kelas}.`id_kelas` && {$this->table}.`id_spp` = {$this->spp}.`id_spp` && {$this->table}.nis = :nis");
    $this->db->bind('nis', $nis);
    return $this->db->result();
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table}, {$this->kelas}, {$this->spp} WHERE {$this->table}.`id_kelas` = {$this->kelas}.`id_kelas` && {$this->table}.`id_spp` = {$this->spp}.`id_spp`");
    return $this->db->resultAll();
  }

  public function validateLogin() {
    $this->db->query("CALL getSiswa(:nis, :password)");
    $this->db->bind('nis', $_POST['username']);
    $this->db->bind('password', $_POST['password']);
    return $this->db->rowCount();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `nisn` = :nisn && `nis` = :nis");
    $this->db->bind('nisn', $_POST['nisn']);
    $this->db->bind('nis', $_POST['nis']);
    return $this->db->rowCount();
  }
  
  public function login() {
    $this->db->query("CALL getSiswa(:nis, :password)");
    $this->db->bind('nis', $_POST['username']);
    $this->db->bind('password', $_POST['password']);
    return $this->db->result();
  }

  public function count() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES (:nisn, :nis, :nama, :id_kelas, :alamat, :no_telp, :id_spp)");
    $this->db->bind('nisn', $_POST['nisn']);
    $this->db->bind('nis', $_POST['nis']);
    $this->db->bind('nama', $_POST['nama']);
    $this->db->bind('id_kelas', $_POST['id_kelas']);
    $this->db->bind('alamat', $_POST['alamat']);
    $this->db->bind('no_telp', $_POST['no_telp']);
    $this->db->bind('id_spp', $_POST['id_spp']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->table} SET `nama` = :nama, `id_kelas` = :id_kelas, `alamat` = :alamat, `no_telp` = :no_telp, `id_spp` = :id_spp WHERE `nisn` = :nisn && `nis` = :nis");
    $this->db->bind('nisn', $_POST['nisn']);
    $this->db->bind('nis', $_POST['nis']);
    $this->db->bind('nama', $_POST['nama']);
    $this->db->bind('id_kelas', $_POST['id_kelas']);
    $this->db->bind('alamat', $_POST['alamat']);
    $this->db->bind('no_telp', $_POST['no_telp']);
    $this->db->bind('id_spp', $_POST['id_spp']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE FROM {$this->table} WHERE `nisn` = :nisn && `nis` = :nis");
    $this->db->bind('nisn', $_POST['nisn']);
    $this->db->bind('nis', $_POST['nis']);
    return $this->db->rowCount();
  }

}