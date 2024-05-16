<?php 

    CLass AdminModel {

        private $tbAdmin = 'admin',
                $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Mengambil data admin berdasarkan email admin
        public function getAdminByEmail($email) {
            $query = "SELECT * FROM {$this->tbAdmin} WHERE admin_email = :admin_email";

            $this->db->query($query);
            $this->db->bind('admin_email', $email);
            $this->db->execute();
            return $this->db->singleResult();
        }

        public function getAdminById($id) {
            $query = "SELECT * FROM {$this->tbAdmin} WHERE admin_id = :admin_id";

            $this->db->query($query);
            $this->db->bind('admin_id', $id);
            return $this->db->singleResult();
        }

        // Mengambil semua data admin yang memiliki level admin saja
        public function getAllAdmin() {
            $query = "SELECT * FROM {$this->tbAdmin} WHERE level = 'worker' ORDER BY admin_id DESC";

            $this->db->query($query);
            $this->db->execute();
            return $this->db->allResult();
        }

        // Insert data ke tabel admin
        public function addAdmin() {
            
            try {

                $this->db->beginTransaction();

                $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);

                $query = "INSERT INTO {$this->tbAdmin}(admin_name, admin_email, admin_password, level, status) VALUES (:admin_name, :email_admin, :password, :level, :status)";

                $this->db->query($query);
                $this->db->bind('admin_name', htmlspecialchars($_POST['username']));
                $this->db->bind('email_admin', htmlspecialchars($_POST['email']));
                $this->db->bind('password', $passwordHash);
                $this->db->bind('level', 'worker');
                $this->db->bind('status', $_POST['status']);
                $this->db->execute();
                $this->db->commit();

                return 1;

            } catch(Exception $e) {

                $this->db->rollback();
                echo $e;

            }

        }

        public function updateAdmin($id) {

           try {

                $this->db->beginTransaction();

                $query = "UPDATE {$this->tbAdmin} SET admin_name = :admin_name, admin_email = :admin_email, status = :status WHERE admin_id = :admin_id";

                $this->db->query($query);
                $this->db->bind('admin_name', htmlspecialchars($_POST['username']));
                $this->db->bind('admin_email', htmlspecialchars($_POST['email']));
                $this->db->bind('status', htmlspecialchars($_POST['status']));
                $this->db->bind('admin_id', $id);
                $this->db->execute();
                $this->db->commit();

                return 1;

           } catch(Exception $e) {

                $this->db->rollback();
                echo $e;

           }

        }

        public function deleteAdmin($id) {

            try {

                $this->db->beginTransaction();

                    
                $query = "DELETE FROM {$this->tbAdmin} WHERE admin_id = :id";

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
