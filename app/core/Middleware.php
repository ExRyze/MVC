<?php

class Middleware {

  public static function auth() {
    if(!isset($_SESSION['user'])) {
      header("Location :".BASE_URL."/admin/login");
    }
  }
  
}