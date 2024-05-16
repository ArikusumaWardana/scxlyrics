<?php 

    Class ArtistModel {

        private $tb = 'artist',
                $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getAllArtist() {

            $query = "SELECT * FROM {$this->tb} ORDER BY artist_id DESC";

            $this->db->query($query);
            return $this->db->allResult();

        }

        public function getArtist() {

            $query = "SELECT * FROM {$this->tb} ORDER BY artist_name ASC";

            $this->db->query($query);
            return $this->db->allResult();

        }

        public function getArtistById($id) {

            $query = "SELECT * FROM {$this->tb} WHERE artist_id = :id";

            $this->db->query($query);
            $this->db->bind('id', $id);
            return $this->db->singleResult();

        }

        public function getArtistDuplikat() {

            $query = "SELECT * FROM {$this->tb} WHERE artist_name = :artist_name AND artist_slug = :artist_slug AND artist_desc = :artist_desc";
            
            $this->db->query($query);
            $this->db->bind('artist_name', htmlspecialchars($_POST['artist_name']));
            $this->db->bind('artist_slug', htmlspecialchars($_POST['artist_slug']));
            $this->db->bind('artist_desc', $_POST['artist_desc']);
            return $this->db->singleResult();

        }

        public function addArtist() {

            try {

                $this->db->beginTransaction();

                $query = "INSERT INTO {$this->tb} (artist_name, artist_slug, artist_desc) 
                    VALUES (:nama_artist, :slug_artist, :artist_desc)";

                $this->db->query($query);
                $this->db->bind('nama_artist', htmlspecialchars($_POST['artist_name']));
                $this->db->bind('slug_artist', htmlspecialchars($_POST['artist_slug']));
                $this->db->bind('artist_desc', $_POST['artist_desc']);
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
                    SET artist_name = :nama_artist, artist_slug = :slug_artist, artist_desc = :artist_desc WHERE artist_id = :id";
                $this->db->query($query);
                $this->db->bind('nama_artist', htmlspecialchars($_POST['artist_name']));
                $this->db->bind('slug_artist', htmlspecialchars($_POST['artist_slug']));
                $this->db->bind('artist_desc', $_POST['artist_desc']);
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

                $query = "DELETE FROM {$this->tb} WHERE artist_id = :id";
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