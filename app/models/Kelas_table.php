<?php

class Kelas_table {

  private $table = 'kelas';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->resultAll();
  }

  public function count() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->rowCount();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `id_kelas` = :id_kelas");
    $this->db->bind('id_kelas', $_POST['id_kelas']);
    return $this->db->rowCount();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} (`nama_kelas`, `kompetensi_keahlian`) VALUES (:nama_kelas, :kompetensi_keahlian)");
    $this->db->bind('nama_kelas', $_POST['nama_kelas']);
    $this->db->bind('kompetensi_keahlian', $_POST['kompetensi_keahlian']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->table} SET `nama_kelas` = :nama_kelas, `kompetensi_keahlian` = :kompetensi_keahlian WHERE `id_kelas` = :id_kelas");
    $this->db->bind('id_kelas', $_POST['id_kelas']);
    $this->db->bind('nama_kelas', $_POST['nama_kelas']);
    $this->db->bind('kompetensi_keahlian', $_POST['kompetensi_keahlian']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE FROM {$this->table} WHERE `id_kelas` = :id_kelas");
    $this->db->bind('id_kelas', $_POST['id_kelas']);
    return $this->db->rowCount();
  }

}