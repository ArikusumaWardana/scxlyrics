<?php 

    Class Genre extends Controller {

        public function index() {

            $data['page-title'] = "Genre Data";

            $this->view('templates/header-admin', $data);
                $this->view('genre/genre', $data);
            $this->view('templates/footer-admin');

        }

        public function add() {

            $data['page-title'] = "Tambah Genre";

            $this->view('templates/header-admin', $data);
                $this->view('genre/add', $data);
            $this->view('templates/footer-admin');

        }

        public function tambahGenre() {

            if($this->model('GenreModel')->addGenre($_POST) > 0 ) {
                redirect('genre');
            } else {
                back();
            }

        }

    }