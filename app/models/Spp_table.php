<?php

class Spp_table {

  private $table = 'spp';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->resultAll();
  }

  public function store() {
    $this->db->query("INSERT INTO {$this->table} VALUES (null, :tahun, :nominal)");
    $this->db->bind('tahun', $_POST['tahun']);
    $this->db->bind('nominal', $_POST['nominal']);
    return $this->db->rowCount();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `id_spp` = :id_spp");
    $this->db->bind('id_spp', $_POST['id_spp']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->table} SET `tahun` = :tahun, `nominal` = :nominal WHERE `id_spp` = :id_spp");
    $this->db->bind('id_spp', $_POST['id_spp']);
    $this->db->bind('tahun', $_POST['tahun']);
    $this->db->bind('nominal', $_POST['nominal']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE FROM {$this->table} WHERE `id_spp` = :id_spp");
    $this->db->bind('id_spp', $_POST['id_spp']);
    return $this->db->rowCount();
  }

}