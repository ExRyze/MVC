<?php

class Siswa_tabel {

    private $tabel = "siswa";
    private $pengguna = "pengguna";
    private $kelas = "kelas";
    private $pembayaran = "pembayaran";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function get($nis) {
        $this->db->query("SELECT * FROM {$this->tabel} s INNER JOIN {$this->pengguna} p ON s.`pengguna_id` = p.`id_pengguna`
        INNER JOIN {$this->kelas} k ON s.`kelas_id` = k.`id_kelas` INNER JOIN {$this->pembayaran} b ON s.`pembayaran_id` = b.`id_pembayaran` WHERE s.`nis` = :nis");
        $this->db->bind("nis", $nis);
        return $this->db->result();
    }

    public function getAll() {
        $this->db->query("SELECT * FROM {$this->tabel} s INNER JOIN {$this->pengguna} p ON s.`pengguna_id` = p.`id_pengguna`
        INNER JOIN {$this->kelas} k ON s.`kelas_id` = k.`id_kelas` INNER JOIN {$this->pembayaran} b ON s.`pembayaran_id` = b.`id_pembayaran`");
        return $this->db->resultAll();
    }

    public function count() {
        $this->db->query("SELECT * FROM {$this->tabel}");
        return $this->db->rowCount();
    }

    public function validate() {
        $this->db->query("CALL getSiswa(:nisn, :nis)");
        $this->db->bind("nisn", $_POST['nisn']);
        $this->db->bind("nis", $_POST['username']);
        return $this->db->rowCount();
    }

    public function insert() {
        $this->db->query("CALL insSiswa(:nisn, :nis, :nama_siswa, :telepon, :alamat, :kelas_id, :pembayaran_id)");
        $this->db->bind("nisn", $_POST['nisn']);
        $this->db->bind("nis", $_POST['username']);
        $this->db->bind("nama_siswa", $_POST['nama_siswa']);
        $this->db->bind("telepon", $_POST['telepon']);
        $this->db->bind("alamat", $_POST['alamat']);
        $this->db->bind("kelas_id", $_POST['kelas_id']);
        $this->db->bind("pembayaran_id", $_POST['pembayaran_id']);
        return $this->db->rowCount();
    }

    public function update() {
        $this->db->query("CALL updSiswa(:id_siswa, :password, :nisn, :nis, :nama_siswa, :telepon, :alamat, :kelas_id, :pembayaran_id)");
        $this->db->bind("id_siswa", $_POST['id_siswa']);
        $this->db->bind("password", $_POST['password']);
        $this->db->bind("nisn", $_POST['nisn']);
        $this->db->bind("nis", $_POST['username']);
        $this->db->bind("nama_siswa", $_POST['nama_siswa']);
        $this->db->bind("telepon", $_POST['telepon']);
        $this->db->bind("alamat", $_POST['alamat']);
        $this->db->bind("kelas_id", $_POST['kelas_id']);
        $this->db->bind("pembayaran_id", $_POST['pembayaran_id']);
        return $this->db->rowCount();
    }

}