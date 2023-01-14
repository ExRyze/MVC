<?php

class Users_Table {

  private $table = 'users';
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `email` = :email && `password` = :password");
    $this->db->bind('email', $_POST['email']);
    $this->db->bind('password', $_POST['password']);
    return $this->db->rowCount();
  }

  public function validateUsername() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `username` = :username ");
    $this->db->bind('username', $_POST['username']);
    return $this->db->rowCount();
  }

  public function validateEmail() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `email` = :email");
    $this->db->bind('email', $_POST['email']);
    return $this->db->rowCount();
  }
  
  public function register() {
    $this->db->query("INSERT INTO {$this->table} (`username`, `email`, `password`) VALUES (:username, :email, :password)");
    $this->db->bind('username', $_POST['username']);
    $this->db->bind('email', $_POST['email']);
    $this->db->bind('password', $_POST['password']);
    return $this->db->rowCount();
  }

  public function login() {
    $this->db->query("SELECT * FROM {$this->table} WHERE `email` = :email && `password` = :password");
    $this->db->bind('email', $_POST['email']);
    $this->db->bind('password', $_POST['password']);
    return $this->db->result();
  }

}