<?php 

    class Home extends Controller {

        public function index() {
            $data['title-page'] = 'Home';

            $this->view('templates/header-user', $data);
                $this->view('parts/navbar');
                    $this->view('home/index');
                $this->view('parts/footer');
            $this->view('templates/footer-user');
        }


    }