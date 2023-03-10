<?php

class Transaksi_tabel {

  private $tabel = "transaksi";
  private $siswa = "siswa";
  private $kelas = "kelas";
  private $petugas = "petugas";
  private $pembayaran = "pembayaran";
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getAll() {
    $this->db->query("SELECT * FROM {$this->tabel} t LEFT JOIN {$this->siswa} s ON t.`siswa_id` = s.`id_siswa`
    LEFT JOIN {$this->kelas} k ON s.`kelas_id` = k.`id_kelas`
    LEFT JOIN {$this->petugas} a ON t.`petugas_id` = a.`id_petugas`
    LEFT JOIN {$this->pembayaran} b ON t.`pembayaran_id` = b.`id_pembayaran`");
    return $this->db->resultAll();
  }

  public function get($nis) {
    $this->db->query("SELECT * FROM {$this->tabel} t LEFT JOIN {$this->siswa} s ON t.`siswa_id` = s.`id_siswa` WHERE s.`nis` = :nis");
    $this->db->bind("nis", $nis);
    return $this->db->resultAll();
  }

  public function getSiswa() {
    $this->db->query("SELECT * FROM {$this->tabel} t LEFT JOIN {$this->siswa} s ON t.`siswa_id` = s.`id_siswa`
    LEFT JOIN {$this->kelas} k ON s.`kelas_id` = k.`id_kelas`
    LEFT JOIN {$this->petugas} a ON t.`petugas_id` = a.`id_petugas`
    LEFT JOIN {$this->pembayaran} b ON t.`pembayaran_id` = b.`id_pembayaran` WHERE s.`id_siswa` = :idSiswa");
    $this->db->bind("idSiswa", $_SESSION['sppsch2']['id_siswa']);
    return $this->db->resultAll();
  }

  public function getPetugas() {
    $this->db->query("SELECT * FROM {$this->tabel} t LEFT JOIN {$this->siswa} s ON t.`siswa_id` = s.`id_siswa`
    LEFT JOIN {$this->kelas} k ON s.`kelas_id` = k.`id_kelas`
    LEFT JOIN {$this->petugas} a ON t.`petugas_id` = a.`id_petugas`
    LEFT JOIN {$this->pembayaran} b ON t.`pembayaran_id` = b.`id_pembayaran` WHERE a.`id_petugas` = :idPetugas");
    $this->db->bind("idPetugas", $_SESSION['sppsch2']['id_petugas']);
    return $this->db->resultAll();
  }

  public function validate() {
    $this->db->query("SELECT * FROM {$this->tabel} WHERE `bulan_dibayar` = :bulanDibayar && `tahun_dibayar` = :tahunDibayar && `siswa_id` = :siswaId");
    $this->db->bind("bulanDibayar", $_POST['bulanDibayar']);
    $this->db->bind("tahunDibayar", $_POST['tahunDibayar']);
    $this->db->bind("siswaId", $_POST['siswaId']);
    return $this->db->rowCount();
  }

  public function create() {
    $this->db->query("INSERT INTO {$this->tabel} VALUES (null, :tanggal, :bulanDibayar, :tahunDibayar, :siswaId, :petugasId, :pembayaranId)");
    $this->db->bind("tanggal", date("Y-m-d h:i:s"));
    $this->db->bind("bulanDibayar", $_POST['bulanDibayar']);
    $this->db->bind("tahunDibayar", $_POST['tahunDibayar']);
    $this->db->bind("siswaId", $_POST['siswaId']);
    $this->db->bind("petugasId", $_POST['petugasId']);
    $this->db->bind("pembayaranId", $_POST['pembayaranId']);
    return $this->db->rowCount();
  }

  public function delete() {
    $this->db->query("DELETE FROM {$this->tabel} WHERE {$this->tabel}.`id_transaksi` = :idTransaksi");
    $this->db->bind("idTransaksi", $_POST['idTransaksi']);
    return $this->db->rowCount();
  }

}