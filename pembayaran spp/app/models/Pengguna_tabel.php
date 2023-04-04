<?php

class Pengguna_tabel {

    private $tabel = 'pengguna';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function logPetugas() {
        $this->db->query("CALL logPetugas(:username, :password)");
        $this->db->bind("username", $_POST['username']);
        $this->db->bind("password", (md5($_POST['password']).SALT));
        return $this->db->result();
    }

    public function logSiswa() {
        $this->db->query("CALL logSiswa(:username, :password)");
        $this->db->bind("username", $_POST['username']);
        $this->db->bind("password", (md5($_POST['password']).SALT));
        return $this->db->result();
    }

    public function validate() {
        $this->db->query("CALL logPengguna(:username, :password)");
        $this->db->bind("username", $_POST['username']);
        $this->db->bind("password", (md5($_POST['password']).SALT));
        return $this->db->rowCount();
    }

    public function insert() {
        $this->db->query("CALL insPengguna(:username, :password, :role)");
        $this->db->bind("username", $_POST['username']);
        $this->db->bind("password", (md5($_POST['password']).SALT));
        $this->db->bind("role", $_POST['role']);
        return $this->db->rowCount();
    }

    public function delete() {
        $this->db->query("CALL delPengguna(:id_pengguna)");
        $this->db->bind("id_pengguna", $_POST['id_pengguna']);
        return $this->db->rowCount();
    }

}