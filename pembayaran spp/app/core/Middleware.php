<?php

class Middleware {

    static function auth() {
        if(isset($_SESSION['spp']) === false) {
            Functions::redirect("login");
        }
    }

    static function noAuth() {
        if(isset($_SESSION['spp']) === true) {
            Functions::redirect();
        }
    }

    static function role($role = false) {
        Middleware::auth();
        if($_SESSION['spp']['role'] != $role) {
            switch ($role) {
                case 'admin':
                    if($_SESSION['spp']['role'] != "admin") {
                        if($_SESSION['spp']['role'] === "petugas") {
                            return Functions::redirect("petugas");
                        } else {
                            return Functions::redirect("siswa");
                        }
                    }
                    break;
                case 'petugas':
                    if($_SESSION['spp']['role'] === "siswa") {
                        return Functions::redirect("siswa");
                    }
                    break;
                case 'siswa':
                    if($_SESSION['spp']['role'] != $role) {
                        return Functions::redirect("petugas");
                    }
                    break;
            }
        }
    }
    
}