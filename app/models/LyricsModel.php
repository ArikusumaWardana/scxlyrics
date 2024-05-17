<?php 

    Class LyricsModel {

        private $tb_lyrics = 'lyrics',
                $allLyrics = "SELECT lyrics.id_lyrics, lyrics.id_genre, lyrics.id_artist, lyrics.lyrics_title, lyrics.lyrics_slug, genre.genre_name, artist.artist_name, lyrics.image_cover, lyrics.date_upload, lyrics.japan_lyrics, lyrics.english_lyrics, lyrics.indo_lyrics, lyrics.link_embed FROM lyrics INNER JOIN genre ON lyrics.id_genre = genre.genre_id INNER JOIN artist ON lyrics.id_artist = artist.artist_id",
                $db;

        public function __construct() {
            
            $this->db = new Database;

        }

        public function getAllLyrics() {

            $query = "{$this->allLyrics} ORDER BY {$this->tb_lyrics}.id_lyrics DESC";
            
            $this->db->query($query);
            return $this->db->allResult();

        }

        public function getLyricsById($id) {

            $query = "{$this->allLyrics} WHERE id_lyrics = :id";

            $this->db->query($query);
            $this->db->bind('id', $id);
            return $this->db->singleResult();

        }

        public function getUploadLyrics() {

            $query = "{$this->allLyrics} ORDER BY id_lyrics DESC LIMIT 10";
            
            $this->db->query($query);
            return $this->db->allResult();

        }

        public function getRandomLyrics() {
            
            $query = "{$this->allLyrics} ORDER BY RAND() LIMIT 10";

            $this->db->query($query);
            return $this->db->allResult();

        }

        public function getLyricsBySlug($slug) {

            $query = "{$this->allLyrics} WHERE lyrics_slug = :slug";

            $this->db->query($query);
            $this->db->bind('slug', $slug);
            return $this->db->singleResult();

        }

        public function getLyricsBySearch() {

            $search = $_POST['keyword'];

            $query = "{$this->allLyrics} WHERE lyrics_title LIKE :keyword OR genre_name LIKE :keyword";

            $this->db->query($query);
            $this->db->bind('keyword', "%$search%");
            return $this->db->allResult();

        }

        public function getLyricsDuplikat() {

            $query = "{$this->allLyrics} WHERE lyrics_title = :lyrics_title AND lyrics_slug = :lyrics_slug";
            
            $this->db->query($query);
            $this->db->bind('lyrics_title', $_POST['lyrics_title']);
            $this->db->bind('lyrics_slug', $_POST['lyrics_slug']);
            return $this->db->singleResult();

        }

        public function addLyrics($fileName) {

            try {

                $this->db->beginTransaction();

                $query = "INSERT INTO {$this->tb_lyrics} (id_genre, id_artist, lyrics_title, lyrics_slug, image_cover, date_upload, japan_lyrics, english_lyrics, indo_lyrics, link_embed)
                    VALUES (:id_genre, :id_artist, :title_lyrics, :slug_lyrics, :image_cover, :date_upload, :japan_lyrics, :english_lyrics, :indo_lyrics, :link_embed)
                ";
                $this->db->query($query);
                $this->db->bind('id_genre', $_POST['genre_lyrics']);
                $this->db->bind('id_artist', $_POST['artist_lyrics']);
                $this->db->bind('title_lyrics', $_POST['lyrics_title']);
                $this->db->bind('slug_lyrics', $_POST['lyrics_slug']);
                $this->db->bind('image_cover', $fileName);
                $this->db->bind('date_upload', $_POST['upload_date']);
                $this->db->bind('japan_lyrics', $_POST['japan_lyrics']);
                $this->db->bind('english_lyrics', $_POST['english_lyrics']);
                $this->db->bind('indo_lyrics', $_POST['indonesia_lyrics']);
                $this->db->bind('link_embed', $_POST['embed_link']);
                $this->db->execute();
                $this->db->commit();

                return 1;

            } catch (Exception $e) {
 
                $this->db->rollback();
                echo $e->getMessage();

            }

        }

        public function updateLyrics() {
            
        }
        
    }