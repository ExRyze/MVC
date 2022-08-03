<?php

class home {
  public function index() {
    require_once "../app//model/user.php";
    echo "Index Method";
  }

  public function user() {
    echo "User Method";
  }
}
