<?php 

    Class Details extends Controller {

        public function index() {
            
            $data['title-page'] = 'Details';

            $this->view('templates/header-user', $data);
                $this->view('parts/navbar');
                    $this->view('details/index');
                $this->view('parts/footer');
            $this->view('templates/footer-user');

        }

    }
