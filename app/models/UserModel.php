<?php 

    Class UserModel {
        
        private $tbUser  = 'user',
                $tbAdmin = 'admin',
                $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function register() {
            $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT);

            $query = "INSERT INTO {$this->tbUser}(name, username, email_user, password) VALUES(:name, :username, :email_user, :password)";

            $this->db->query($query);
            $this->db->bind('name', htmlspecialchars($_POST['name']));
            $this->db->bind('username', htmlspecialchars($_POST['username']));
            $this->db->bind('email_user', htmlspecialchars($_POST['email_user']));
            $this->db->bind('password', $password);

            $this->db->execute();
            return $this->db->rowCount();
        }

        public function getUserbyEmail($email) {

            $query = "SELECT * FROM {$this->tbUser} WHERE email_user = :email_user";

            $this->db->query($query);
            $this->db->bind('email_user', $email);
            $this->db->execute();
            return $this->db->singleResult();
        }

        public function allUser() {

            $query = "SELECT * FROM user ORDER BY id_user DESC";

            $this->db->query($query);
            $this->db->execute();
            return $this->db->allResult();

        }

    }