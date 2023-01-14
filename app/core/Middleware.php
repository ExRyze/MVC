<?php

class Middleware {

  static function auth() {
    if(!isset($_SESSION['user'])) {
      return header("Location: ".BASE_URL."/login");
    }
  }
  
  static function level($level) {
    Middleware::auth();
    if($_SESSION['user']['level'] != $level) {
      return Functions::back();
    }
  }

}