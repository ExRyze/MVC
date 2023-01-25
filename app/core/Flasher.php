<?php

class Flasher {

  public static function setMessage($message, $type) {
    $_SESSION['flasher'] = ['message'=>$message,'type'=>$type];
  }

  public static function setFlasher() {
    if(isset($_SESSION['flasher'])) {
      echo "<div class='alert {$_SESSION['flasher']['type']}'>{$_SESSION['flasher']['message']}</div>";
      unset($_SESSION['flasher']);
    }
  }

}