<?php

class Middleware {

  static function auth() {
    if(!isset($_SESSION['ExSPP'])) {
      return header("Location: ".BASE_URL."/login");
    }
  }

  static function noAuth() {
    if(isset($_SESSION['ExSPP'])) {
      return header("Location: ".BASE_URL);
    }
  }
  
  static function level($level) {
    Middleware::auth();
    if($level === "siswa") {
      if(isset($_SESSION['ExSPP']['user']['level'])) {
        return Functions::redirect("petugas");
      }
    } else {
      if(isset($_SESSION['ExSPP']['user']['nisn'])) {
        return Functions::redirect("siswa");}
      if($_SESSION['ExSPP']['user']['level'] != $level) {
        return Functions::back();}
    }
  }

}