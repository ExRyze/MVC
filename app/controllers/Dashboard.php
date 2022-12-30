<?php

class Dashboard extends Controllers {

  public function index() {
    $data['page'] = 'MVC | Dashboard';
    return $this->view('dashboard/index', $data);
  }

}