<?php

class Dashboard extends Controllers {

  public function index() {
    $data['page'] = 'MVC | Dashboard';
    return $this->view('dashboard/index', $data);
  }

  public function error($code = 404) {
    $data['page'] = 'EXBD | Error';
    return $this->view('error/404', $data);
  }

}