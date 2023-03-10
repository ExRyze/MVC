<?php

class Petugas_tabel {

  private $tabel = "petugas";
  private $pengguna = "pengguna";
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->tabel} a LEFT JOIN {$this->pengguna} p ON a.`pengguna_id` = p.`id_pengguna`");
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->tabel} a LEFT JOIN {$this->pengguna} p ON a.`pengguna_id` = p.`id_pengguna` WHERE a.`nama_petugas` = :namaPetugas && p.`username` = :username");
    $this->db->bind("namaPetugas", $_POST['namaPetugas']);
    $this->db->bind("username", $_POST['username']);
    return $this->db->rowCount();
  }

  public function create() {
    $this->db->query("INSERT INTO {$this->tabel} VALUES (null, :namaPetugas, LAST_INSERT_ID())");
    $this->db->bind("namaPetugas", $_POST['namaPetugas']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->tabel} a LEFT JOIN {$this->pengguna} p ON a.`pengguna_id` = p.`id_pengguna` SET `username` = :username, `password` = :password, `nama_petugas` = :namaPetugas WHERE a.`id_petugas` = :idPetugas");
    $this->db->bind("idPetugas", $_POST['idPetugas']);
    $this->db->bind("username", $_POST['username']);
    $this->db->bind("password", $_POST['password']);
    $this->db->bind("namaPetugas", $_POST['namaPetugas']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("CALL delPengguna(:idPengguna)");
    $this->db->bind("idPengguna", $_POST['idPengguna']);
    return $this->db->rowCount();
  }

}