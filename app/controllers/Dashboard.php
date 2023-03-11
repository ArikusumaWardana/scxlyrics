<?php 

    Class Dashboard extends Controller {

        public function __construct() {
            if(!isset($_SESSION['admin']['id_admin'])) {
                redirect('/');
            }
        }

        public function index() {
            $data['page-title'] = 'Dashboard';

            $this->view('templates/header-admin', $data);
                $this->view('dashboard/dashboard');
            $this->view('templates/footer-admin');
        }
        

    }
