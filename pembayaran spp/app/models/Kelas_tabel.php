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

    public function count() {
        $this->db->query("SELECT * FROM {$this->tabel}");
        return $this->db->rowCount();
    }

    public function validate() {
        $this->db->query("CALL getKelas(:nama_kelas, :kompetensi_keahlian)");
        $this->db->bind("nama_kelas", $_POST['nama_kelas']);
        $this->db->bind("kompetensi_keahlian", $_POST['kompetensi_keahlian']);
        return $this->db->rowCount();
    }

    public function insert() {
        $this->db->query("CALL insKelas(:nama_kelas, :kompetensi_keahlian)");
        $this->db->bind("nama_kelas", $_POST['nama_kelas']);
        $this->db->bind("kompetensi_keahlian", $_POST['kompetensi_keahlian']);
        return $this->db->rowCount();
    }

    public function update() {
        $this->db->query("CALL updKelas(:id_kelas, :nama_kelas, :kompetensi_keahlian)");
        $this->db->bind("id_kelas", $_POST['id_kelas']);
        $this->db->bind("nama_kelas", $_POST['nama_kelas']);
        $this->db->bind("kompetensi_keahlian", $_POST['kompetensi_keahlian']);
        return $this->db->rowCount();
    }

    public function delete() {
        $this->db->query("CALL delKelas(:id_kelas)");
        $this->db->bind("id_kelas", $_POST['id_kelas']);
        return $this->db->rowCount();
    }

}