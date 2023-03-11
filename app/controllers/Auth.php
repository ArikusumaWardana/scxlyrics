<?php 

    Class Auth extends Controller {

        // Mengembalikan user kehalaman home jika user sudah login
        public function __construct()
        {
            if(isset($_SESSION['logged'])) {
                redirect('/');
            }
        }

        // Fungsi untuk masuk ke halaman register
        public function register() {

            $data['title-page'] = 'Register';

            $this->view('templates/logreg-header', $data);
                    $this->view('register/index');
            $this->view('templates/logreg-footer');

        }

        // Fungsi untuk melakukan registrasi user berdasarkan data" yang diinputkan
        public function registerProcess() {
            if($this->model('UserModel')->register($_POST) > 0) {
                header('Location: ' . baseUrl . 'auth/login/');
            } else {
                die('gagal');
            }
        }

        // Fungsi untuk masuk ke halaman login
        public function login() {

            $data['title-page'] = 'Login';

            $this->view('templates/logreg-header', $data);
                $this->view('login/index');
            $this->view('templates/logreg-footer');

        }

        // Fungsi untuk melakukan login user 
        public function authenticate() {

            $user   = $this->model('UserModel')->getUserByEmail($_POST['email']);
            $admin  = $this->model('AdminModel')->getAdminByEmail($_POST['email']);


            if($user) {
                if(password_verify($_POST['password'], $user['password'])) {
                    $this->userSession($user);
                    redirect('/');
                    return $user;
                } else {
                    echo "Email atau password salah!";
                    die;
                }
            } elseif($admin) {
                if(password_verify($_POST['password'], $admin['password'])) {
                    $this->adminSession($admin);
                    redirect('/dashboard');
                    return $admin;
                } else {
                    echo "Email atau password salah!";
                    die;
                }
            } else {
                echo "Login gagal";
                die;
            }

        }

        // Mengelompokan sesi dari user
        public function adminSession($admin) {
            $_SESSION['admin'] = $admin;
            $_SESSION['logged'] = true;
        }
        
        // Mengelompokan sesi dari admin
        public function userSession($user) {
            $_SESSION['user'] = $user;
            $_SESSION['logged'] = true;
        }

        public function logout() {
            session_destroy();
            redirect('/');
        }


    }
