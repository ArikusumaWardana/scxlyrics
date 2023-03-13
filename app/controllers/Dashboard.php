<?php 

    Class Dashboard extends Controller {

        public function __construct() {
            if(!isset($_SESSION['admin']['id_admin'])) {
                redirect('/');
            }
        }

        public function index() {

            $data = [
                "page-title" => "Dashboard",
                "user" => $this->model('UserModel')->allUser(),
                "admin" => $this->model('AdminModel')->getAllAdmin()
            ];

            $this->view('templates/header-admin', $data);
                $this->view('dashboard/dashboard', $data);
            $this->view('templates/footer-admin');
        }
        

    }
