<?php

class Pengguna_tabel {

  private $tabel = "pengguna";
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function validate() {
    $this->db->query("CALL valPengguna(:username, :password)");
    $this->db->bind("username", $_POST['username']);
    $this->db->bind("password", $_POST['password']);
    return $this->db->result();
  }

  public function logSiswa() {
    $this->db->query("CALL logSiswa(:username, :password)");
    $this->db->bind("username", $_POST['username']);
    $this->db->bind("password", $_POST['password']);
    return $this->db->result();
  }

  public function logPetugas() {
    $this->db->query("CALL logPetugas(:username, :password)");
    $this->db->bind("username", $_POST['username']);
    $this->db->bind("password", $_POST['password']);
    return $this->db->result();
  }

}