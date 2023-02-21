<?php

class Siswa_table {

  private $table = 'siswa';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table}, `kelas`, `spp` WHERE {$this->table}.`id_kelas` = `kelas`.`id_kelas` && {$this->table}.`id_spp` = `spp`.`id_spp`");
    return $this->db->resultAll();
  }

  public function validateLogin() {
    $this->db->query("CALL getSiswa(:nis, :password)");
    $this->db->bind('nis', $_POST['username']);
    $this->db->bind('password', $_POST['password']);
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

  public function list() {
    $this->db->query("SELECT {$this->table}.`nisn`, {$this->table}.`nis`, {$this->table}.`nama`, {$this->table}.`id_spp`, `spp`.`nominal` FROM {$this->table}, `spp` WHERE {$this->table}.`id_spp` = `spp`.`id_spp`");
    return $this->db->resultAll();
  }

  public function storeSPP() {
    $this->db->query("INSERT INTO `spp` (`tahun`, `nominal`) VALUES (:tahun, :nominal)");
    $this->db->bind('tahun', $_POST['tahun']);
    $this->db->bind('nominal', $_POST['nominal']);
    return $this->db->rowCount();
  }

  public function getIDSPP() {
    $this->db->query("SELECT MAX(`id_spp`) AS `id_spp` FROM `spp`");
    return $this->db->result();
  }

  public function store($spp) {
    $this->db->query("INSERT INTO {$this->table} (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES (:nisn, :nis, :nama, :id_kelas, :alamat, :no_telp, :id_spp)");
    $this->db->bind('nisn', $_POST['nisn']);
    $this->db->bind('nis', $_POST['nis']);
    $this->db->bind('nama', $_POST['nama']);
    $this->db->bind('id_kelas', $_POST['id_kelas']);
    $this->db->bind('alamat', $_POST['alamat']);
    $this->db->bind('no_telp', $_POST['no_telp']);
    $this->db->bind('id_spp', $spp['id_spp']);
    return $this->db->rowCount();
  }

  public function updateSPP() {
    $this->db->query("UPDATE `spp` SET `tahun` = :tahun, `nominal` = :nominal WHERE `id_spp` = :id_spp");
    $this->db->bind('id_spp', $_POST['id_spp']);
    $this->db->bind('tahun', $_POST['tahun']);
    $this->db->bind('nominal', $_POST['nominal']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->table} SET `nama` = :nama, `id_kelas` = :id_kelas, `alamat` = :alamat, `no_telp` = :no_telp WHERE `nisn` = :nisn && `nis` = :nis");
    $this->db->bind('nisn', $_POST['nisn']);
    $this->db->bind('nis', $_POST['nis']);
    $this->db->bind('nama', $_POST['nama']);
    $this->db->bind('id_kelas', $_POST['id_kelas']);
    $this->db->bind('alamat', $_POST['alamat']);
    $this->db->bind('no_telp', $_POST['no_telp']);
    return $this->db->rowCount();
  }

  public function deleteSPP() {
    $this->db->query("DELETE FROM `spp` WHERE `id_spp` = :id_spp");
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