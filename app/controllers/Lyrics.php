<?php

use function PHPSTORM_META\map;

    Class Lyrics extends Controller {

        public function index() {

            $data = [
                'page-title' => 'Lyrics Data',
                'all-lyrics' => $this->model('LyricsModel')->getAllLyrics()
            ];

            $this->view('templates/header-admin', $data);
                $this->view('lyrics/lyrics', $data);
            $this->view('templates/footer-admin');
            

        }

        public function add() {

            $data = [
                'page-title' => 'Tambah Lyrics',
                'all-genre' => $this->model('GenreModel')->getGenre(),
                'all-artist' => $this->model('ArtistModel')->getArtist()
            ];

            $this->view('templates/header-admin', $data);
                $this->view('lyrics/add', $data);
            $this->view('templates/footer-admin');

        } 

        public function store() {

            $lyricsPost = $_POST['lyrics_title'] && $_POST['lyrics_slug'] && 
                $_POST['genre_lyrics'] && $_POST['artist_lyrics'] && 
                $_POST['upload_date'] && $_POST['embed_link'];

            $lyricsDuplikat = $this->model('LyricsModel')->getLyricsDuplikat();

            $extAllowed = array('png', 'jpg', 'jpeg');
            $image = $_FILES['img_cover']['name'];
            $fileParts = explode('.', $image);
            $ext = strtolower(end($fileParts));
            $file_tmp = $_FILES['img_cover']['tmp_name'];
            $fileName = uniqid('', true).'.'.$ext;
           

            if(!empty($lyricsPost)) {

                if(!$lyricsDuplikat) {

                    if(in_array($ext, $extAllowed) === true) {

                        move_uploaded_file($file_tmp, '../public/assets/upload/'.$fileName);

                        if($this->model('LyricsModel')->addLyrics($fileName) > 0 ) {
                
                            Flasher::setFlash('Data lyrics berhasil ditambahkan!', 'success');
                            return redirect('lyrics');
    
                        } else {
    
                            Flasher::setFlash('Data lyrics gagal ditambahkan!', 'danger');
                            return back();
    
                        }

                    } else {
                        
                        Flasher::setFlash('Upload image gagal', 'danger');
                        return back();

                    }

                } else {

                    Flasher::setFlash('Data lyrics sudah ada!', 'warning');
                    return back();

                }

            } else {

                Flasher::setFlash('Masukan data terlebih dahulu', 'warning');
                return back();

            }

        }

    }