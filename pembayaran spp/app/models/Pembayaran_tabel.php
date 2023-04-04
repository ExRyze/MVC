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
        $this->db->query("CALL getPembayaran(:tahun_ajaran, :nominal)");
        $this->db->bind("tahun_ajaran", $_POST['tahun_ajaran']);
        $this->db->bind("nominal", $_POST['nominal']);
        return $this->db->rowCount();
    }

    public function insert() {
        $this->db->query("CALL insPembayaran(:tahun_ajaran, :nominal)");
        $this->db->bind("tahun_ajaran", $_POST['tahun_ajaran']);
        $this->db->bind("nominal", $_POST['nominal']);
        return $this->db->rowCount();
    }

    public function update() {
        $this->db->query("CALL updPembayaran(:id_pembayaran, :tahun_ajaran, :nominal)");
        $this->db->bind("id_pembayaran", $_POST['id_pembayaran']);
        $this->db->bind("tahun_ajaran", $_POST['tahun_ajaran']);
        $this->db->bind("nominal", $_POST['nominal']);
        return $this->db->rowCount();
    }

    public function delete() {
        $this->db->query("CALL delPembayaran(:id_pembayaran)");
        $this->db->bind("id_pembayaran", $_POST['id_pembayaran']);
        return $this->db->rowCount();
    }

}