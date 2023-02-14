<?php

class Petugas_table {

  private $table = 'petugas';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->resultAll();
  }
  
  public function validateLogin() {
    $this->db->query("CALL getPetugas(:username, :password)");
    $this->db->bind('username', $_POST['username']);
    $this->db->bind('password', $_POST['password']);
    return $this->db->rowCount();
  }

  public function login() {
    $this->db->query("CALL getPetugas(:username, :password)");
    $this->db->bind('username', $_POST['username']);
    $this->db->bind('password', $_POST['password']);
    return $this->db->result();
  }

  public function count() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `level` = 'petugas'");
    return $this->db->rowCount();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `id_petugas` = :id_petugas");
    $this->db->bind('id_petugas', $_POST['id_petugas']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`username`, `password`, `nama_petugas`, `level`) VALUES (:username, :password, :nama_petugas, :level)");
    $this->db->bind('username', $_POST['username']);
    $this->db->bind('password', $_POST['password']);
    $this->db->bind('nama_petugas', $_POST['nama_petugas']);
    $this->db->bind('level', $_POST['level']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->table} SET `username` = :username, `password` = :password, `nama_petugas` = :nama_petugas, `level` = :level WHERE `id_petugas` = :id_petugas");
    $this->db->bind('id_petugas', $_POST['id_petugas']);
    $this->db->bind('username', $_POST['username']);
    $this->db->bind('password', $_POST['password']);
    $this->db->bind('nama_petugas', $_POST['nama_petugas']);
    $this->db->bind('level', $_POST['level']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE FROM {$this->table} WHERE `id_petugas` = :id_petugas");
    $this->db->bind('id_petugas', $_POST['id_petugas']);
    return $this->db->rowCount();
  }

}