<?php

class Pembayaran_tabel {

  private $tabel = "pembayaran";
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->tabel}");
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->tabel} b WHERE b.`tahun_ajaran` = :tahunAjaran && b.`nominal` = :nominal");
    $this->db->bind("tahunAjaran", $_POST['tahunAjaran']);
    $this->db->bind("nominal", $_POST['nominal']);
    return $this->db->rowCount();
  }

  public function create() {
    $this->db->query("INSERT INTO {$this->tabel} VALUES (null, :tahunAjaran, :nominal)");
    $this->db->bind("tahunAjaran", $_POST['tahunAjaran']);
    $this->db->bind("nominal", $_POST['nominal']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->tabel} b SET `tahun_ajaran` = :tahunAjaran, `nominal` = :nominal WHERE b.`id_pembayaran` = :idPembayaran");
    $this->db->bind("idPembayaran", $_POST['idPembayaran']);
    $this->db->bind("tahunAjaran", $_POST['tahunAjaran']);
    $this->db->bind("nominal", $_POST['nominal']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE FROM {$this->tabel} WHERE {$this->tabel}.`id_pembayaran` = :idPembayaran");
    $this->db->bind("idPembayaran", $_POST['idPembayaran']);
    return $this->db->rowCount();
  }

}