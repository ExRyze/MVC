<?php

class Petugas_Table {

  private $table = "petugas";
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `username` = :username && `password` = :password");
    $this->db->bind("username", $_POST['username']);
    $this->db->bind("password", $_POST['password']);
    return $this->db->rowCount();
  }

  public function validateNama() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `username` = :username");
    $this->db->bind("username", $_POST['username']);
    return $this->db->rowCount();
  }

  public function validateEditNama() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `id_petugas` = :id && `username` = :username");
    $this->db->bind("id", $_POST['id']);
    $this->db->bind("username", $_POST['username']);
    return $this->db->rowCount();
  }

  public function login() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `username` = :username && `password` = :password");
    $this->db->bind("username", $_POST['username']);
    $this->db->bind("password", $_POST['password']);
    return $this->db->result();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`nama_petugas`, `username`, `password`, `telp`, `level`) VALUES (:nama_petugas, :username, :password, :telp, :level)");
    $this->db->bind("nama_petugas", $_POST['nama']);
    $this->db->bind("username", $_POST['username']);
    $this->db->bind("password", $_POST['password']);
    $this->db->bind("telp", $_POST['telp']);
    $this->db->bind("level", $_POST['level']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->table} SET `nama_petugas` = :nama_petugas, `username` = :username, `telp` = :telp, `level` = :level WHERE `id_petugas` = :id");
    $this->db->bind("id", $_POST['id']);
    $this->db->bind("nama_petugas", $_POST['nama']);
    $this->db->bind("username", $_POST['username']);
    $this->db->bind("telp", $_POST['telp']);
    $this->db->bind("level", $_POST['level']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE FROM {$this->table} WHERE `id_petugas` = :id");
    $this->db->bind("id", $_POST['id']);
    return $this->db->rowCount();
  }

}