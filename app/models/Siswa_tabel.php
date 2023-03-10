<?php

class Siswa_tabel {

  private $tabel = "siswa";
  private $pengguna = "pengguna";
  private $pembayaran = "pembayaran";
  private $kelas = "kelas";
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function get($nis) {
    $this->db->query("SELECT * FROM {$this->tabel} s LEFT JOIN {$this->pengguna} p ON s.`pengguna_id` = p.`id_pengguna`
    LEFT JOIN {$this->pembayaran} b ON s.`pembayaran_id` = b.`id_pembayaran`
    LEFT JOIN {$this->kelas} k ON s.`kelas_id` = k.`id_kelas` WHERE s.`nis` = :nis");
    $this->db->bind("nis", $nis);
    return $this->db->result();
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->tabel} s LEFT JOIN {$this->pengguna} p ON s.`pengguna_id` = p.`id_pengguna`
    LEFT JOIN {$this->pembayaran} b ON s.`pembayaran_id` = b.`id_pembayaran`
    LEFT JOIN {$this->kelas} k ON s.`kelas_id` = k.`id_kelas`");
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->tabel} WHERE `nisn` = :nisn && `nis` = :nis");
    $this->db->bind("nisn", $_POST['nisn']);
    $this->db->bind("nis", $_POST['username']);
    return $this->db->rowCount();
  }

  public function create() {
    $this->db->query("INSERT INTO {$this->tabel} VALUES (null, :nisn, :nis, :namaSiswa, :alamat, :telepon, :kelasId, LAST_INSERT_ID(), :pembayaranId)");
    $this->db->bind("nisn", $_POST['nisn']);
    $this->db->bind("nis", $_POST['username']);
    $this->db->bind("namaSiswa", $_POST['namaSiswa']);
    $this->db->bind("alamat", $_POST['alamat']);
    $this->db->bind("telepon", $_POST['telepon']);
    $this->db->bind("kelasId", $_POST['kelasId']);
    $this->db->bind("pembayaranId", $_POST['pembayaranId']);
    return $this->db->rowCount();
  }

  public function update() {
    $this->db->query("UPDATE {$this->tabel} s LEFT JOIN {$this->pengguna} p ON s.`pengguna_id` = p.`id_pengguna` SET `username` = :nis, `password` = :password, `nisn` = :nisn, `nis` = :nis, `nama_siswa` = :namaSiswa, `alamat` = :alamat, `telepon` = :telepon, `kelas_id` = :kelasId, `pembayaran_id` = :pembayaranId WHERE s.`id_siswa` = :idSiswa");
    $this->db->bind("idSiswa", $_POST['idSiswa']);
    $this->db->bind("password", $_POST['password']);
    $this->db->bind("nisn", $_POST['nisn']);
    $this->db->bind("nis", $_POST['username']);
    $this->db->bind("namaSiswa", $_POST['namaSiswa']);
    $this->db->bind("alamat", $_POST['alamat']);
    $this->db->bind("telepon", $_POST['telepon']);
    $this->db->bind("kelasId", $_POST['kelasId']);
    $this->db->bind("pembayaranId", $_POST['pembayaranId']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("CALL delPengguna(:idPengguna)");
    $this->db->bind("idPengguna", $_POST['penggunaId']);
    return $this->db->rowCount();
  }

}