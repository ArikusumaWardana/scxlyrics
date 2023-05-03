<?php

    Class Artist extends Controller {

        public function index() {

            $data = [
                'page-title' => 'Artist Data'
            ];

            $this->view('templates/header-admin', $data);
                $this->view('artist/artist', $data);
            $this->view('templates/footer-admin');

        }

        public function add() {

            $data = [
                'page-title' => 'Tambah Artist'
            ];
            
            $this->view('templates/header-admin', $data);
                $this->view('artist/add', $data);
            $this->view('templates/footer-admin');

        }

        public function store() {

            $artistpost = $_POST['artist_name'] && $_POST['artist_slug'];
            $duplikat = $this->model('ArtistModel')->getArtistDuplikat($_POST);

            if(!empty($artistpost)) {

                if(!$duplikat) {

                    if($this->model('ArtistModel')->addArtist($_POST) > 0 ) {

                        Flasher::setFlash('Data artist berhasil ditambahkan!', 'success');
                        return redirect('artist');

                    } else {

                        Flasher::setFlash('Data artist gagal ditambahkan!', 'danger');
                        return back();

                    }

                } else {

                    Flasher::setFlash('Data artist sudah ada!', 'warning');
                    return back();

                }

            } else {

                Flasher::setFlash('Isikan data terlebih dahulu!', 'warning');
                return back();

            }

        }

    }