<?php

class Functions {

    static function back() {
        echo "<script>javascript:history.go(-1);</script>";
    }

    static function redirect($url = "") {
        header("Location: ".BURL."/".$url);
        exit();
    }
    
}