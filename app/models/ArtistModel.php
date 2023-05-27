<?php 

    Class ArtistModel {

        private $tb = 'artist',
                $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getAllArtist() {

            $query = "SELECT * FROM {$this->tb} ORDER BY id_artist DESC";

            $this->db->query($query);
            return $this->db->allResult();

        }

        public function getArtist() {

            $query = "SELECT * FROM {$this->tb} ORDER BY nama_artist ASC";

            $this->db->query($query);
            return $this->db->allResult();

        }

        public function getArtistById($id) {

            $query = "SELECT * FROM {$this->tb} WHERE id_artist = :id";

            $this->db->query($query);
            $this->db->bind('id', $id);
            return $this->db->singleResult();

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

        public function updateArtist($id) {

            try {

                $this->db->beginTransaction();

                $query = "UPDATE {$this->tb}
                    SET nama_artist = :nama_artist, slug_artist = :slug_artist WHERE id_artist = :id";
                $this->db->query($query);
                $this->db->bind('nama_artist', htmlspecialchars($_POST['artist_name']));
                $this->db->bind('slug_artist', htmlspecialchars($_POST['artist_slug']));
                $this->db->bind('id', $id);
                $this->db->execute();
                $this->db->commit();

                return 1;

            } catch(Exception $e) {

                $this->db->rollback();
                echo $e;

            }

        }

        public function deleteArtist($id) {

            try {

                $this->db->beginTransaction();

                $query = "DELETE FROM {$this->tb} WHERE id_artist = :id";
                $this->db->query($query);
                $this->db->bind('id', $id);
                $this->db->execute();
                $this->db->commit();

                return 1;

            } catch(Exception $e) {

                $this->db->rollback();
                echo $e;

            }

        }

    }