<?php

class Middleware {

  public static function auth($status = true) {
    if($status === true && !isset($_SESSION['user'])) {
      return header("Location :".BASE_URL."/admin/login");
    } else if($status === false && isset($_SESSION['user'])) {
      return header("Location :".BASE_URL."/admin");
    }
  }
}