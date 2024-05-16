<?php 

    Class Dashboard extends Controller {

        public function __construct() {
            if(!isset($_SESSION['admin']['admin_id'])) {
                redirect('/');
            }
        }

        public function index() {

            $data = [
                "page-title" => "Dashboard",
                "user" => $this->model('UserModel')->allUser(),
                "admin" => $this->model('AdminModel')->getAllAdmin(),
                "artist" => $this->model('ArtistModel')->getAllArtist(),
                "lyrics" => $this->model('LyricsModel')->allLyrics(),
                "history" => $this->model('LyricsModel')->getAllLyrics()
            ];

            $this->view('templates/header-admin', $data);
                $this->view('dashboard/dashboard', $data);
            $this->view('templates/footer-admin');
        }
        

    }
