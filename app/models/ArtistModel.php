<?php 

    Class ArtistModel {

        private $tb = 'artist',
                $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getAllArtist() {

            $query = "SELECT * FROM {$this->tb}";

            $this->db->query($query);
            return $this->db->allResult();

        }

        public function getArtistDuplikat() {

            $query = "SELECT * FROM {$this->tb} WHERE nama_artist = :nama_artist AND slug_artist = :slug_artist";
            
            $this->db->query($query);
            $this->db->bind('nama_artist', $_POST['artist_name']);
            $this->db->bind('slug_artist', $_POST['artist_slug']);
            return $this->db->singleResult();

        }

        public function addArtist() {

            try {

                $this->db->beginTransaction();

                $query = "INSERT INTO {$this->tb} (nama_artist, slug_artist) 
                    VALUES (:nama_artist, :slug_artist)";

                $this->db->query($query);
                $this->db->bind('nama_artist', htmlspecialchars($_POST['artist_name']));
                $this->db->bind('slug_artist', htmlspecialchars($_POST['artist_slug']));
                $this->db->execute();
                $this->db->commit();

                return 1;

            } catch(Exception $e) {

                $this->db->rollback();
                echo $e;

            }

        }

    }