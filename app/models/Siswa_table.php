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

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `email` = :email && `password` = :password");
    $this->db->bind('email', $_POST['email']);
    $this->db->bind('password', $_POST['password']);
    return $this->db->rowCount();
  }
  
  public function login() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `email` = :email && `password` = :password");
    $this->db->bind('email', $_POST['email']);
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

  // public function validateUsername() {
  //   $this->db->query("SELECT * FROM {$this->table} WHERE `username` = :username ");
  //   $this->db->bind('username', $_POST['username']);
  //   return $this->db->rowCount();
  // }

  // public function validateEmail() {
  //   $this->db->query("SELECT * FROM {$this->table} WHERE `email` = :email");
  //   $this->db->bind('email', $_POST['email']);
  //   return $this->db->rowCount();
  // }
  
  // public function register() {
  //   $this->db->query("INSERT INTO {$this->table} (`username`, `email`, `password`) VALUES (:username, :email, :password)");
  //   $this->db->bind('username', $_POST['username']);
  //   $this->db->bind('email', $_POST['email']);
  //   $this->db->bind('password', $_POST['password']);
  //   return $this->db->rowCount();
  // }

}