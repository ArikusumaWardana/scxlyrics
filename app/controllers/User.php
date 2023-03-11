<?php 

    Class User extends Controller {

        public function __construct() {
        
        }
        
        public function index() {
            
            $data['page-title'] = 'User Data';
            $data['all-user'] = $this->model('UserModel')->allUser();

            $this->view('templates/header-admin', $data);
                $this->view('user/user', $data);
            $this->view('templates/footer-admin');

        }

    }
