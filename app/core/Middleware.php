<?php

class Middleware {
  
  static function auth() {
    if(!isset($_SESSION['sppsch2'])) {
      return Functions::redirect("login");
    }
  }

  static function noAuth() {
    if(isset($_SESSION['sppsch2'])) {
      return Functions::redirect();
    }
  }

  static function role($role = null) {
    Middleware::auth();
    if(is_null($role)) {
      if($_SESSION['sppsch2']['role'] === "siswa") {
        return Functions::redirect("siswa");
      } else {
        return Functions::redirect("petugas");
      }
    } else {
      if($role === "siswa" && $_SESSION['sppsch2']['role'] != $role) {
        return Functions::redirect("petugas");
      } else if($role != "siswa" && $_SESSION['sppsch2']['role'] != $role) {
        return Functions::redirect("siswa");
      }
    }
  }
  
}