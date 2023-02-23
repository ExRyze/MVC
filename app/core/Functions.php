<?php

class Functions {
  
  static function back() {
    echo("<script>javascript:history.go(-1);</script>");
  }

  static function redirect($to) {
    header("Location: ".BASE_URL."/".$to);
    exit;
  }
  
}