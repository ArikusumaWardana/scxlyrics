<?php 

    class Home extends Controller {

        public function index() {
            $data['title-page'] = 'Home';
            $data['lyrics'] = $this->model('LyricsModel')->getAllLyrics();

            $this->view('templates/header-user', $data);
                $this->view('parts/navbar');
                    $this->view('home/index', $data);
                $this->view('parts/footer');
            $this->view('templates/footer-user');
        }

        public function search() {

            $data['title-page'] = 'Home';
            $data['lyrics'] = $this->model('LyricsModel')->getLyricsBySearch(); 

            $this->view('templates/header-user', $data);
                $this->view('parts/navbar');
                    $this->view('home/index', $data);
                $this->view('parts/footer');
            $this->view('templates/footer-user');

        }


    }