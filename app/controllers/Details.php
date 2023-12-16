<?php 

    Class Details extends Controller {

        public function index($slug) {
            
            $data['title-page'] = 'Details';
            $data['upload'] = $this->model('LyricsModel')->getUploadLyrics();
            $data['lyrics-detail'] = $this->model('LyricsModel')->getLyricsBySlug($slug);
            $data['get-all-genre'] = $this->model('GenreModel')->getAllGenre();

            $this->view('templates/header-user', $data);
                $this->view('parts/navbar');
                    $this->view('details/index', $data);
                $this->view('parts/footer');
            $this->view('templates/footer-user');

        }

    }
