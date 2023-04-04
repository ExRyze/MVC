<?php

class Petugas extends Controller {

    public $data;

    public function __construct() {
        // middleware
        Middleware::role("petugas");
        $this->data['highlight'] = [
            'siswa' => $this->model("Siswa")->count(),
            'transaksi' => $this->model("Transaksi")->count(),
            'kelas' => $this->model("Kelas")->count(),
            'petugas' => $this->model("Petugas")->count()
        ];
    }

    public function index() {
        // data
        $this->data['page'] = "Petugas - Home";

        // view
        return $this->view("petugas/index", $this->data);
    }

    public function entri($nis = null) {
        // entri
        if($nis) {
            // ada data siswa?
            if($this->model("siswa")->get($nis)) {
                $this->data['page'] = "Petugas - Entri ".$nis;
                $this->data['siswa'] = $this->model("siswa")->get($nis);
                $this->data['transaksi'] = $this->model("transaksi")->get($nis);
                $this->data['bulan'] = ["Juli", "Agustus", "September", "Oktober", "November", "Desember", "Januari", "Februari", "Maret", "April", "Mei", "Juni"];
                return $this->view("petugas/entri", $this->data);
            }
        }

        // search
        $this->data['page'] = "Petugas - Entri pembayaran";
        $this->data['tabel'] = $this->model("siswa")->getAll();
        return $this->view("petugas/entrisearch", $this->data);
    }

    public function history() {
        // data
        $this->data['page'] = "Petugas - History Transaksi";
        $this->data['tabel'] = $this->model("transaksi")->getPetugas();

        // view
        return $this->view("petugas/history", $this->data);
    }
    public function laporan() {
        // middelware
        Middleware::role("admin");

        // data
        $this->data['page'] = "Petugas - Laporan Transaksi";
        $this->data['bulan'] = ["Juli", "Agustus", "September", "Oktober", "November", "Desember", "Januari", "Februari", "Maret", "April", "Mei", "Juni"];
        $this->data['tabel'] = $this->model("siswa")->getAll();
        $this->data['transaksi'] = $this->model("transaksi")->getAll();

        // proses
        foreach ($this->data['tabel'] as $is => $siswa) {
            $this->data['tabel'][$is]['bulan'] = [];
            foreach ($this->data['transaksi'] as $it => $transaksi) {
                if($siswa['id_siswa'] === $transaksi['siswa_id']) {
                    array_push($this->data['tabel'][$is]['bulan'], $transaksi['bulan_dibayar']);
                    unset($this->data['transaksi'][$it]);
                }
            }
        }

        // view
        return $this->view("petugas/laporan", $this->data);
    }

    public function tabel($tabel = "") {
        // middelware
        if($tabel != "kelas") {
            Middleware::role("admin");
        }

        // check file
        if(file_exists("../app/views/petugas/tabel_".$tabel.".php")) {
            // data
            $this->data['page'] = "Petugas - Tabel ".$tabel;
            $this->data['key'] = $tabel;
            $this->data['tabel'] = $this->model($tabel)->getAll();

            // Extended data
            switch ($tabel) {
                case 'kelas':
                    $this->data['kompetensi'] = ["Audio Video", "Multimedia", "Rekayasa Perangkat Lunak", "Teknik Komputer Jaringan"];
                    break;
                case 'siswa':
                    $this->data['kelas'] = $this->model("kelas")->getAll();
                    $this->data['pembayaran'] = $this->model("pembayaran")->getAll();
                    break;
            }
    
            // view
            return $this->view("petugas/tabel_".$tabel, $this->data);
        }
        return Functions::redirect("petugas");
    }

    public function tambah($tabel = "") {
        // middelware
        switch ($tabel) {
            case 'transaksi': // add config for transaksi
                if(!$this->model($tabel)->validate()) {
                    $this->model($tabel)->insert();
                    Flasher::setPesan("Berhasil melakukan transaksi!", "success");
                    return Functions::back();
                } else {
                    Flasher::setPesan("Terjadi kesalahan!", "warning");
                    return Functions::back();
                }
            case 'kelas':
                break;
            
            default:
                Middleware::role("admin");
                break;
        }

        // check file
        if(file_exists("../app/views/petugas/tabel_".$tabel.".php")) {
            if(!$this->model($tabel)->validate()) {
                if($tabel === "siswa" || $tabel === "petugas") {
                    $this->model("pengguna")->insert();
                }
                $this->model($tabel)->insert();
                Flasher::setPesan("Data berhasil ditambahkan!", "success");
                return Functions::redirect("petugas/tabel/".$tabel);
            } else {
                Flasher::setPesan("Data sudah ada atau terjadi kesalahan!", "warning");
                return Functions::back();
            }
        }

        return Functions::redirect("petugas");
    }
    
    public function edit($tabel = "") {
        // middelware
        if($tabel != "kelas") {
            Middleware::role("admin");
        }

        // check file
        if(file_exists("../app/views/petugas/tabel_".$tabel.".php")) {
            switch ($tabel) {
                case 'transaksi': // no edit for transaksi
                    return Functions::back();
                
                default: // default config
                    if($this->model($tabel)->update()) {
                        Flasher::setPesan("Data berhasil diperbaharui!", "success");
                        return Functions::redirect("petugas/tabel/".$tabel);
                    } else {
                        Flasher::setPesan("Data tidak ditemukan atau terjadi kesalahan!", "warning");
                        return Functions::back();
                    }
            }
        }

        // file not exist
        return Functions::redirect("petugas");
    }
    
    public function hapus($tabel = "") {
        // middelware
        if($tabel != "kelas") {
            Middleware::role("admin");
        }

        // check file
        if(file_exists("../app/views/petugas/tabel_".$tabel.".php")) {
            switch ($tabel) {
                case 'siswa': // hapus config for siswa or petugas
                    if($this->model("pengguna")->delete()) {
                        Flasher::setPesan("Data berhasil dihapus!", "success");
                        return Functions::redirect("petugas/tabel/".$tabel);
                    }
                    break;
                case 'petugas':
                    if($this->model("pengguna")->delete()) {
                        Flasher::setPesan("Data berhasil dihapus!", "success");
                        return Functions::redirect("petugas/tabel/".$tabel);
                    }
                    break;
                
                default: //default config
                    if($this->model($tabel)->delete()) {
                        
                        Flasher::setPesan("Data berhasil dihapus!", "success");
                        return Functions::redirect("petugas/tabel/".$tabel);
                    } else {
                        Flasher::setPesan("Data tidak ditemukan atau terjadi kesalahan!", "warning");
                        return Functions::back();
                    }
            }
        }

        return Functions::redirect("petugas");
    }

}