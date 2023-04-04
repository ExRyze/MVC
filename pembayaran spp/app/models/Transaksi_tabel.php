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

    public function get($nis) {
        $this->db->query("SELECT * FROM {$this->tabel} t INNER JOIN {$this->siswa} s ON t.`siswa_id` = s.`id_siswa`
        INNER JOIN {$this->petugas} a ON t.`petugas_id` = a.`id_petugas` WHERE s.`nis` = :nis");
        $this->db->bind(":nis", $nis);
        return $this->db->resultAll();
    }

    public function getPetugas() {
        $this->db->query("SELECT * FROM {$this->tabel} t INNER JOIN {$this->siswa} s ON t.`siswa_id` = s.`id_siswa` INNER JOIN {$this->kelas} k ON s.`kelas_id` = k.`id_kelas`
        INNER JOIN {$this->petugas} a ON t.`petugas_id` = a.`id_petugas` INNER JOIN {$this->pembayaran} b ON t.`pembayaran_id` = b.`id_pembayaran` WHERE t.`petugas_id` = :id");
        $this->db->bind(":id", $_SESSION['spp']['id_petugas']);
        return $this->db->resultAll();
    }

    public function getSiswa() {
        $this->db->query("SELECT * FROM {$this->tabel} t INNER JOIN {$this->siswa} s ON t.`siswa_id` = s.`id_siswa` INNER JOIN {$this->kelas} k ON s.`kelas_id` = k.`id_kelas`
        INNER JOIN {$this->petugas} a ON t.`petugas_id` = a.`id_petugas` INNER JOIN {$this->pembayaran} b ON t.`pembayaran_id` = b.`id_pembayaran` WHERE t.`siswa_id` = :id");
        $this->db->bind(":id", $_SESSION['spp']['id_siswa']);
        return $this->db->resultAll();
    }

    public function getAll() {
        $this->db->query("SELECT * FROM {$this->tabel} t INNER JOIN {$this->siswa} s ON t.`siswa_id` = s.`id_siswa`");
        return $this->db->resultAll();
    }

    public function count() {
        $this->db->query("SELECT SUM(b.`nominal`) AS `total` FROM {$this->tabel} t INNER JOIN {$this->pembayaran} b ON t.`pembayaran_id` = b.`id_pembayaran` WHERE b.`tahun_ajaran` = :tahun");
        if(date("m") <= 6) {$date = (date("Y")-1)."/".date("Y");}
        else {$date = date("Y")."/".(date("Y")+1);}
        $this->db->bind(":tahun", $date);
        return $this->db->result();
    }

    public function validate() {
        $this->db->query("CALL getTransaksi(:siswa_id, :bulan_dibayar, :tahun_dibayar)");
        $this->db->bind("siswa_id", $_POST['siswa_id']);
        $this->db->bind("bulan_dibayar", $_POST['bulan_dibayar']);
        $this->db->bind("tahun_dibayar", $_POST['tahun_dibayar']);
        return $this->db->rowCount();
    }

    public function insert() {
        $this->db->query("CALL insTransaksi(:tanggal_bayar, :bulan_dibayar, :tahun_dibayar, :siswa_id, :petugas_id, :pembayaran_id)");
        $this->db->bind("tanggal_bayar", date("Y-m-d h:i:s"));
        $this->db->bind("bulan_dibayar", $_POST['bulan_dibayar']);
        $this->db->bind("tahun_dibayar", $_POST['tahun_dibayar']);
        $this->db->bind("siswa_id", $_POST['siswa_id']);
        $this->db->bind("petugas_id", $_POST['petugas_id']);
        $this->db->bind("pembayaran_id", $_POST['pembayaran_id']);
        return $this->db->rowCount();
    }

    public function delete() {
        $this->db->query("CALL delTransaksi(:id_transaksi)");
        $this->db->bind("id_transaksi", $_POST['id_transaksi']);
        return $this->db->rowCount();
    }

}