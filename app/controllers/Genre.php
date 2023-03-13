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

        public function store() {

            $genrepost = $_POST['genre_name'] && $_POST['genre_slug'] && $_POST['genre_desc'];

            if(!empty($genrepost)) {

                if($this->model('GenreModel')->addGenre($_POST) > 0 ) {
                    Flasher::setFlash('Data genre berhasil ditambahkan!', 'success');
                    return redirect('genre');
                } else {
                    Flasher::setFlash('Data genre gagal ditambahkan!', 'danger');
                    return back();
                }

            } else {

                Flasher::setFlash('Isikan data terlebih dahulu!', 'warning');
                return back();

            }

        }

    }