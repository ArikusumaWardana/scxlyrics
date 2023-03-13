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

        public function addGenre() {

            try {

                $query = "INSERT INTO {$this->tb}(nama_genre, slug_genre, description) VALUES (:nama_genre, :slug_genre, :description)";

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

    }
