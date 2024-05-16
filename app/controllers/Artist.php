<?php

    Class Artist extends Controller {

        public function index() {

            $data = [
                'page-title' => 'Artist Data',
                'all-artist' => $this->model('ArtistModel')->getAllArtist()
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

        public function edit($id) {

            $data = [
                'page-title' => 'Update Artist',
                'get-artist' => $this->model('ArtistModel')->getArtistById($id)
            ];
            
            $this->view('templates/header-admin', $data);
                $this->view('artist/edit', $data);
            $this->view('templates/footer-admin');

        }

        public function update($id) {

            $artistpost = $_POST['artist_name'] && $_POST['artist_slug'] && $_POST['artist_desc'];
            $duplikat = $this->model('ArtistModel')->getArtistDuplikat($_POST);

            if(!empty($artistpost)) {

                if(!$duplikat) {

                    if($this->model('ArtistModel')->updateArtist($id, $_POST) > 0) {

                        Flasher::setFlash('Data artist berhasil diperbaharui!', 'success');
                        return redirect('artist');

                    } else {

                        Flasher::setFlash('Data artist gagal diperbaharui!', 'danger');
                        return back();

                    }

                } else {

                    Flasher::setFlash('Data artist sudah ada!', 'warning');
                    return back();

                }

            } else {

                Flasher::setFlash('Isi data terlebih dahulu!', 'warning');
                return back();

            }

        }

        public function delete($id) {

            if($this->model('ArtistModel')->deleteArtist($id)) {

                Flasher::setFlash('Data artist berhasil dihapus!', 'success');
                return back();

            } else {

                Flasher::setFlash('Data artist gagal dihapus!', 'danger');
                return back();

            }

        }

    }