<?php

class Middleware {

  public static function auth($status = true) {
    if($status === true && !isset($_SESSION['petugas'])) {
      return header("Location: ".BASE_URL."/admin/login");
    } else if($status === false && isset($_SESSION['petugas'])) {
      return header("Location: ".BASE_URL."/admin");
    }
  }
}