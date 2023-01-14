<?php

class Kelas_table {

  private $table = 'kelas';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function count() {
    $this->db->query("SELECT * FROM {$this->table}");
    return $this->db->rowCount();
  }
}