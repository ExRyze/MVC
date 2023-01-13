<?php

class Flasher {
  
  static function setFlasher($message, $type) {
    $_SESSION['flasher'] = ["message" => $message, "type" => $type];
  }

  static function flasher() {
    if(isset($_SESSION['flasher'])) {
      echo "<div class='{$_SESSION['flasher']['type']}'>{$_SESSION['flasher']['message']}</div>";
      unset($_SESSION['flasher']);
    }
  }

}