<?php

class Blog_model
{
    private $table = "blog";
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
      $this->db->query("INSERT INTO {$this->table} (title, description) VALUES (:title, :desc)");
      $this->db->bind("title", $post["title"]);
      $this->db->bind("desc", $post["description"]);
      return $this->db->rowCount();
    }
}