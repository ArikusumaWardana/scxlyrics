<?php 

    Class GenreModel {

        private $tb = 'genre',
                $db;

        public function __construct() {
            
            $this->db = new Database;

        }

        public function getAllGenre() {
            
        }

        public function addGenre() {

            $query = "INSERT INTO {$this->tb}(nama_genre, slug_genre, description) VALUES (:nama_genre, :slug_genre, :description)";

            $this->db->query($query);
            $this->db->bind('nama_genre', htmlspecialchars($_POST['genre_name']));
            $this->db->bind('slug_genre', htmlspecialchars($_POST['genre_slug']));
            $this->db->bind('description', htmlspecialchars($_POST['genre_desc']));

            $this->db->execute();
            return $this->db->rowCount();

        }

    }
