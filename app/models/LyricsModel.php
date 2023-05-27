<?php 

    Class LyricsModel {

        private $tb = 'lyrics',
                $db;

        public function __construct() {
            
            $this->db = new Database;

        }

        public function allLyrics() {

            $query = "SELECT * FROM {$this->tb} ORDER BY id_lyrics DESC";
            $this->db->query($query);
            return $this->db->allResult();

        }

        public function getAllLyrics() {

            $query = "SELECT lyrics.id_lyrics, lyrics.title_lyrics, lyrics.slug_lyrics, lyrics.date_upload, lyrics.image_cover, lyrics.japan_lyrics, 
                        lyrics.english_lyrics, lyrics.indo_lyrics, lyrics.link_embed, genre.id_genre, genre.nama_genre, genre.slug_genre, genre.description, artist.id_artist, artist.nama_artist, artist.slug_artist 
                        FROM lyrics
                        INNER JOIN genre ON lyrics.id_genre = genre.id_genre
                        INNER JOIN artist ON lyrics.id_artist = artist.id_artist
                        ORDER BY lyrics.id_lyrics DESC";
            
            $this->db->query($query);
            return $this->db->allResult();

        }

        public function getUploadLyrics() {

            $query = "SELECT lyrics.id_lyrics, lyrics.title_lyrics, lyrics.slug_lyrics, lyrics.date_upload, lyrics.image_cover, lyrics.japan_lyrics, 
                        lyrics.english_lyrics, lyrics.indo_lyrics, lyrics.link_embed, genre.id_genre, genre.nama_genre, genre.slug_genre, genre.description, artist.id_artist, artist.nama_artist, artist.slug_artist 
                        FROM lyrics
                        INNER JOIN genre ON lyrics.id_genre = genre.id_genre
                        INNER JOIN artist ON lyrics.id_artist = artist.id_artist
                        ORDER BY lyrics.id_lyrics DESC
                        LIMIT 10";
            
            $this->db->query($query);
            return $this->db->allResult();

        }

        public function getLyricsBySlug($slug) {

            $query = "SELECT lyrics.id_lyrics, lyrics.title_lyrics, lyrics.slug_lyrics, lyrics.date_upload, lyrics.image_cover, lyrics.japan_lyrics, 
            lyrics.english_lyrics, lyrics.indo_lyrics, lyrics.link_embed, genre.id_genre, genre.nama_genre, genre.slug_genre, 			genre.description, artist.id_artist, artist.nama_artist, artist.slug_artist 
            FROM lyrics
            INNER JOIN genre ON lyrics.id_genre = genre.id_genre
            INNER JOIN artist ON lyrics.id_artist = artist.id_artist
            WHERE lyrics.slug_lyrics = :slug";

            $this->db->query($query);
            $this->db->bind('slug', $slug);
            return $this->db->singleResult();

        }

        public function getLyricsBySearch() {

            $search = $_POST['keyword'];

            $query = "SELECT lyrics.id_lyrics, lyrics.title_lyrics, lyrics.slug_lyrics, lyrics.date_upload, lyrics.image_cover, lyrics.japan_lyrics, 
            lyrics.english_lyrics, lyrics.indo_lyrics, lyrics.link_embed, genre.id_genre, genre.nama_genre, genre.slug_genre, genre.description, artist.id_artist, artist.nama_artist, artist.slug_artist 
            FROM lyrics
            INNER JOIN genre ON lyrics.id_genre = genre.id_genre
            INNER JOIN artist ON lyrics.id_artist = artist.id_artist
            WHERE lyrics.title_lyrics LIKE :keyword OR genre.nama_genre LIKE :keyword";

            $this->db->query($query);
            $this->db->bind('keyword', "%$search%");
            return $this->db->allResult();

        }

        public function getLyricsDuplikat() {

            $query = "SELECT * FROM {$this->tb} WHERE title_lyrics = :title_lyrics AND slug_lyrics = :slug_lyrics";
            
            $this->db->query($query);
            $this->db->bind('title_lyrics', $_POST['lyrics_title']);
            $this->db->bind('slug_lyrics', $_POST['lyrics_slug']);
            return $this->db->singleResult();

        }

        public function addLyrics($image) {

            try {

                $this->db->beginTransaction();

                $query = "INSERT INTO {$this->tb} (id_genre, id_artist, title_lyrics, slug_lyrics, image_cover, date_upload, japan_lyrics, english_lyrics, indo_lyrics, link_embed)
                    VALUES (:id_genre, :id_artist, :title_lyrics, :slug_lyrics, :image_cover, :date_upload, :japan_lyrics, :english_lyrics, :indo_lyrics, :link_embed)
                ";
                $this->db->query($query);
                $this->db->bind('id_genre', $_POST['genre_lyrics']);
                $this->db->bind('id_artist', $_POST['artist_lyrics']);
                $this->db->bind('title_lyrics', $_POST['lyrics_title']);
                $this->db->bind('slug_lyrics', $_POST['lyrics_slug']);
                $this->db->bind('image_cover', $image);
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
        
    }