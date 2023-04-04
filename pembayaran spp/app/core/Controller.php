<?php

class Controller {

    public function view($view, $data) {
        require_once("../app/views/".$view.".php");
    }

    public function model($tabel) {
        $tabel .= "_tabel";
        require_once("../app/models/".$tabel.".php");
        return new $tabel;
    }
    
}