<?php

class Petugas_Table {

  private $table = "petugas";
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `username` = :username && `password` = :password");
    $this->db->bind("username", $_POST['username']);
    $this->db->bind("password", $_POST['password']);
    return $this->db->rowCount();
  }

  public function login() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `username` = :username && `password` = :password");
    $this->db->bind("username", $_POST['username']);
    $this->db->bind("password", $_POST['password']);
    return $this->db->result();
  }

}