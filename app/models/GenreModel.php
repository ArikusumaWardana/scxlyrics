<?php 

    Class GenreModel {

        private $tb = 'genre',
                $db;

        public function __construct() {
            
            $this->db = new Database;

        }

        public function getAllGenre() {
            
            $query = "SELECT * FROM {$this->tb} ORDER BY id_genre DESC";

            $this->db->query($query);
            return $this->db->allResult();

        }

        public function getGenreById($id) {

            $query = "SELECT * FROM {$this->tb} WHERE id_genre = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);
            return $this->db->singleResult();

        }

        public function getGenreDuplikat() {

            $query = "SELECT * FROM {$this->tb} WHERE nama_genre = :nama_genre AND slug_genre = :slug_genre";
            $this->db->query($query);
            $this->db->bind('nama_genre', $_POST['genre_name']);
            $this->db->bind('slug_genre', $_POST['genre_slug']);
            return $this->db->singleResult();

        }

        public function addGenre() {

            try {
                $this->db->beginTransaction();

                $query = "INSERT INTO {$this->tb}(nama_genre, slug_genre, description) 
                VALUES (:nama_genre, :slug_genre, :description)";

                $this->db->query($query);
                $this->db->bind('nama_genre', htmlspecialchars($_POST['genre_name']));
                $this->db->bind('slug_genre', htmlspecialchars($_POST['genre_slug']));
                $this->db->bind('description', htmlspecialchars($_POST['genre_desc']));
                $this->db->execute();
                $this->db->commit();

                return 1;

            } catch(Exception $e) {

                $this->db->rollback();
                echo $e;

            }

        }

        public function updateGenre($id) {

            try {

                $this->db->beginTransaction();
                
                $query = "UPDATE {$this->tb} 
                SET nama_genre = :nama_genre, slug_genre = :slug_genre, description = :description WHERE id_genre = :id";
                $this->db->query($query);
                $this->db->bind('nama_genre', $_POST['genre_name']);
                $this->db->bind('slug_genre', $_POST['genre_slug']);
                $this->db->bind('description', $_POST['genre_desc']);
                $this->db->bind('id', $id);
                $this->db->execute();
                $this->db->commit();

                return 1;

            } catch(Exception $e) {

                $this->db->rollback();
                echo $e;

            }

        }

        public function deleteGenre($id) {

            try {

                $this->db->beginTransaction();

                $query = "DELETE FROM {$this->tb} WHERE id_genre = :id";
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
