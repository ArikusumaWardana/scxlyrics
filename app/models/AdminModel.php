<?php 

    CLass AdminModel {

        private $tbAdmin = 'admin',
                $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Mengambil data admin berdasarkan email admin
        public function getAdminByEmail($email) {
            $query = "SELECT * FROM {$this->tbAdmin} WHERE email_admin = :email_admin";

            $this->db->query($query);
            $this->db->bind('email_admin', $email);
            $this->db->execute();
            return $this->db->singleResult();
        }

        public function getAdminById($id) {
            $query = "SELECT * FROM {$this->tbAdmin} WHERE id_admin = $id";

            $this->db->query($query);
            $this->db->bind('id_admin', $id);
            return $this->db->singleResult();
        }

        // Mengambil semua data admin yang memiliki level admin saja
        public function getAllAdmin() {
            $query = "SELECT * FROM {$this->tbAdmin} WHERE level = 'admin'";

            $this->db->query($query);
            $this->db->execute();
            return $this->db->allResult();
        }

        // Insert data ke tabel admin
        public function addAdmin() {
            $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $query = "INSERT INTO {$this->tbAdmin}(username, email_admin, password, level, status) VALUES (:username, :email_admin, :password, :level, :status)";

            $this->db->query($query);
            $this->db->bind('username', htmlspecialchars($_POST['username']));
            $this->db->bind('email_admin', htmlspecialchars($_POST['email']));
            $this->db->bind('password', $passwordHash);
            $this->db->bind('level', 'admin');
            $this->db->bind('status', $_POST['status']);
            $this->db->execute();
            return $this->db->rowCount();

        }

        public function updateAdmin($id) {

            // $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $query = "UPDATE {$this->tbAdmin} SET username = :username, email_admin = :email_admin, status = :status WHERE id_admin = $id";

            $this->db->query($query);
            $this->db->bind('username', htmlspecialchars($_POST['username']));
            $this->db->bind('email_admin', htmlspecialchars($_POST['email']));
            // $this->db->bind('password', $passwordHash);
            $this->db->bind('status', htmlspecialchars($_POST['status']));
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function deleteAdmin($id) {
            $query = "DELETE FROM {$this->tbAdmin} WHERE id_admin = :id";

            $this->db->query($query);
            $this->db->bind('id', $id);
            return $this->db->execute();
        }

    }
