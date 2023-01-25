<?php

class Masyarakat_Table {

  private $table = 'masyarakat';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->resultAll();
  }

  public function validateNIK() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `nik` = :nik");
    $this->db->bind("nik", $_POST['nik']);
    return $this->db->rowCount();
  }

  public function validateNama() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `nik` = :nik && `nama` = :nama");
    $this->db->bind("nik", $_POST['nik']);
    $this->db->bind("nama", $_POST['nama']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query(("INSERT INTO {$this->table} (`nik`, `nama`, `telp`) VALUES (:nik, :nama, :telp)"));
    $this->db->bind("nik", $_POST['nik']);
    $this->db->bind("nama", $_POST['nama']);
    $this->db->bind("telp", $_POST['telp']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query(("UPDATE {$this->table} SET `nama` = :nama, `telp` = :telp WHERE `nik` = :nik"));
    $this->db->bind("nik", $_POST['nik']);
    $this->db->bind("nama", $_POST['nama']);
    $this->db->bind("telp", $_POST['telp']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE FROM {$this->table} WHERE `nik` = :nik");
    $this->db->bind("nik", $_POST['nik']);
    return $this->db->rowCount();
  }

}