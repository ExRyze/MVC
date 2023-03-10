<?php

class Kelas_tabel {

  private $tabel = "kelas";
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->tabel}");
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->tabel} k WHERE k.`nama_kelas` = :namaKelas && k.`kompetensi_keahlian` = :kompetensiKeahlian");
    $this->db->bind("namaKelas", $_POST['namaKelas']);
    $this->db->bind("kompetensiKeahlian", $_POST['kompetensiKeahlian']);
    return $this->db->rowCount();
  }

  public function create() {
    $this->db->query("INSERT INTO {$this->tabel} VALUES (null, :namaKelas, :kompetensiKeahlian)");
    $this->db->bind("namaKelas", $_POST['namaKelas']);
    $this->db->bind("kompetensiKeahlian", $_POST['kompetensiKeahlian']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->tabel} k SET `nama_kelas` = :namaKelas, `kompetensi_keahlian` = :kompetensiKeahlian WHERE k.`id_kelas` = :idKelas");
    $this->db->bind("idKelas", $_POST['idKelas']);
    $this->db->bind("namaKelas", $_POST['namaKelas']);
    $this->db->bind("kompetensiKeahlian", $_POST['kompetensiKeahlian']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE FROM {$this->tabel} WHERE {$this->tabel}.`id_kelas` = :idKelas");
    $this->db->bind("idKelas", $_POST['idKelas']);
    return $this->db->rowCount();
  }

}