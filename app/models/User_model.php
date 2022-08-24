<?php

class User_model
{
    private $table = "user";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getAll() {
      $this->db->query("SELECT * FROM {$this->table}");
      return $this->db->resultAll();
    }

    public function insert($post) {
      $pass = md5($post["password"]) . SALT;
      $this->db->query("INSERT INTO {$this->table} (nis, name, password) VALUES (:nis, :name, :pass)");
      $this->db->bind("nis", $post["nis"]);
      $this->db->bind("name", $post["name"]);
      $this->db->bind("pass", $pass);
      return $this->db->rowCount();
    }

    public function login($post) {
      $pass = md5($post["password"]) . SALT;
      $this->db->query("SELECT * FROM {$this->table} WHERE nis = :nis AND password = :pass");
      $this->db->bind("nis", $post["nis"]);
      $this->db->bind("pass", $pass);
      return $this->db->resultAll();
    }
}