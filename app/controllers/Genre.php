<?php 

    Class Genre extends Controller {

        public function index() {

            $data = [
              'page-title' => 'Genre Data',
              'all-genre' => $this->model('GenreModel')->getAllGenre()
            ];

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
            $duplikat = $this->model('GenreModel')->getGenreDuplikat($_POST);

            // mengecek apakah form yang diinputkan admin kosong atau tidak. 
            if(!empty($genrepost)) {

                // mengecek apakah data yang diinputkan admin sudah ada di database atau belum.
                if(!$duplikat) {

                    if($this->model('GenreModel')->addGenre($_POST) > 0 ) {

                        Flasher::setFlash('Data genre berhasil ditambahkan!', 'success');
                        return redirect('genre');

                    } else {

                        Flasher::setFlash('Data genre gagal ditambahkan!', 'danger');
                        return back();

                    }

                } else {
                    
                    Flasher::setFlash('Data genre sudah ada!', 'warning');
                    return back();

                }

            } else {

                Flasher::setFlash('Isikan data terlebih dahulu!', 'warning');
                return back();

            }

        } 

        public function edit($id) {

            $data = [
                'page-title' => 'Update Genre',
                'get-genre' => $this->model('GenreModel')->getGenreById($id)
            ];

            $this->view('templates/header-admin', $data);
                $this->view('genre/edit', $data);
            $this->view('templates/footer-admin');

        }

        public function update($id) {
        
            $genrepost = $_POST['genre_name'] && $_POST['genre_slug'] && $_POST['genre_desc'];
            $duplikat = $this->model('GenreModel')->getGenreDuplikat($_POST);

            // mengecek apakah form yang diinputkan admin kosong atau tidak.             
            if(!empty($genrepost)) {

                // mengecek apakah data yang diinputkan admin sudah ada di database atau belum.
                if(!$duplikat) {

                    if($this->model('GenreModel')->updateGenre($id) > 0 ) {

                        Flasher::setFlash('Data genre berhasil di update!', 'success');
                        return redirect('genre');

                    } else {

                        Flasher::setFlash('Data genre gagal di update!', 'danger');
                        return back();

                    }

                } else {

                    Flasher::setFlash('Data genre sudah ada!', 'warning');
                    return back();

                }

            } else {
                
                Flasher::setFlash('Masukan data terlebih dahulu!', 'warning');
                return back();

            }

        }

        public function delete($id) {

            if($this->model('GenreModel')->deleteGenre($id) > 0 ) {

                Flasher::setFlash('Date genre berhasil dihapus!', 'success');
                return back();

            } else {

                Flasher::setFlash('Date genre gagal dihapus!', 'danger');
                return back();

            }

        }

    }