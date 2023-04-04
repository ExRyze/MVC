<?php
class Login extends Controller {

    public function __construct() {
        Middleware::noAuth();
    }

    public function index() {
        // data
        $data['page'] = "Login";

        // config
        if (!empty($_POST)) {
            if($this->model("Pengguna")->validate()) {
                if($this->model("Pengguna")->logSiswa()) {
                    $_SESSION['spp'] = $this->model("Pengguna")->logSiswa();
                } else {
                    $_SESSION['spp'] = $this->model("Pengguna")->logPetugas();
                }
                Middleware::role();
                return Middleware::noAuth();
            } else {
                Flasher::setPesan("Data tidak ditemukan!", "warning");
                return Functions::redirect("login");
            }
        }

        // View
        return $this->view("auth/login", $data);
    }

}