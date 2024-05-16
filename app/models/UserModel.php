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

            $query = "INSERT INTO {$this->tbUser}(name, username, user_email, user_password) VALUES(:name, :username, :user_email, :user_password)";

            $this->db->query($query);
            $this->db->bind('name', htmlspecialchars($_POST['name']));
            $this->db->bind('username', htmlspecialchars($_POST['username']));
            $this->db->bind('user_email', htmlspecialchars($_POST['email_user']));
            $this->db->bind('user_password', $password);

            $this->db->execute();
            return $this->db->rowCount();
        }

        public function getUserbyEmail($email) {

            $query = "SELECT * FROM {$this->tbUser} WHERE user_email = :user_email";

            $this->db->query($query);
            $this->db->bind('user_email', $email);
            $this->db->execute();
            return $this->db->singleResult();
        }

        public function allUser() {

            $query = "SELECT * FROM user ORDER BY user_id DESC";

            $this->db->query($query);
            $this->db->execute();
            return $this->db->allResult();

        }

    }