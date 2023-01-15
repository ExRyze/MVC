<?php

class Logout extends Controllers {

  public function index() {
    session_destroy();
    return header("Location: ".BASE_URL."/siswa/login");
  }

}