<?php

class Flasher {

  static function setMessage($message, $type) {
    $_SESSION['flasher'] = ['message'=>$message,'type'=>$type];
  }

  static function setFlasher() {
    if(isset($_SESSION['flasher'])) {
      echo "<div class='alert {$_SESSION['flasher']['type']}'>{$_SESSION['flasher']['message']}</div>";
    }
  }

}