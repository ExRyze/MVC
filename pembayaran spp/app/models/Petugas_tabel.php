<?php

class Petugas_tabel {

    private $tabel = "petugas";
    private $pengguna = "pengguna";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $this->db->query("SELECT * FROM {$this->tabel} a INNER JOIN {$this->pengguna} p ON a.`pengguna_id` = p.`id_pengguna`");
        return $this->db->resultAll();
    }

    public function count() {
        $this->db->query("SELECT * FROM {$this->tabel}");
        return $this->db->rowCount();
    }

    public function validate() {
        $this->db->query("CALL getPetugas(:username, :nama_petugas)");
        $this->db->bind("username", $_POST['username']);
        $this->db->bind("nama_petugas", $_POST['nama_petugas']);
        return $this->db->rowCount();
    }

    public function insert() {
        $this->db->query("CALL insPetugas(:nama_petugas)");
        $this->db->bind("nama_petugas", $_POST['nama_petugas']);
        return $this->db->rowCount();
    }

    public function update() {
        $this->db->query("CALL updPetugas(:id_petugas, :username, :password, :role, :nama_petugas)");
        $this->db->bind("id_petugas", $_POST['id_petugas']);
        $this->db->bind("username", $_POST['username']);
        $this->db->bind("password", $_POST['password']);
        $this->db->bind("role", $_POST['role']);
        $this->db->bind("nama_petugas", $_POST['nama_petugas']);
        return $this->db->rowCount();
    }

}