<?php

class Flasher {

    static function setPesan($pesan, $type) {
        $_SESSION['flasher'] = [
            'pesan' => $pesan,
            'type' => $type
        ];
    }

    static function getPesan() {
        if(isset($_SESSION['flasher'])) {
            echo "<div class='alert alert-{$_SESSION['flasher']['type']}'>{$_SESSION['flasher']['pesan']}</div>";
            unset($_SESSION['flasher']);
        }
    }

}