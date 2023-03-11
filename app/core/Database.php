<?php 

    Class Database {

        private $host   = DB_HOST,
                $user   = DB_USER,
                $pass   = DB_PASS,
                $dbname = DB_NAME,
                $dbh,
                $stmt;

        public function __construct() {
            
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $option = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            try {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
            } catch(PDOException $e) {
                die($e->getMessage());
            }

        }

        public function query($query) {
            $this->stmt = $this->dbh->prepare($query);
        }

        public function bind($param, $value, $type=null) {

            if(is_null($type)) {
                switch(true) {
                    case is_int($value) :
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value) :
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value) :
                        $type = PDO::PARAM_NULL;
                        break;
                    case is_string($value) :
                        $type = PDO::PARAM_STR;
                        break;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }

        public function execute() {
            $this->stmt->execute();
        }

        public function singleResult() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function allResult() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function rowCount() {
            return $this->stmt->rowCount();
        }

    }
