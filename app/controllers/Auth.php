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

            $post = $_POST['name'] && $_POST['username'] && $_POST['email_user'] && $_POST['password'];

            if(!empty($post)) {

                if($this->model('UserModel')->register($_POST) > 0) {
                    Flasher::setFlash('Berhasil Register! login sekarang!', 'success');
                    return redirect('auth/login/');
                } else {
                    Flasher::setFlash('Masukan data dengan benar!', 'danger');
                    return back();
                }

            } else {
                Flasher::setFlash('Masukan data terlebih dahulu!', 'danger');
                return back();
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

            if(!empty($_POST['email'] && $_POST['password'])) {

                if($user) {
                    if(password_verify($_POST['password'], $user['user_password'])) {
                        $this->userSession($user);
                        redirect('/');
                        return $user;
                    } else {
                        Flasher::setFlash('Email atau password salah!', 'danger');
                        return back();
                    }
                } elseif($admin) {
                    if(password_verify($_POST['password'], $admin['admin_password'])) {
                        $this->adminSession($admin);
                        redirect('/dashboard');
                        return $admin;
                    } else {
                        Flasher::setFlash('Email atau password salah!', 'danger');
                        return back();
                    }
                } else {
                    Flasher::setFlash('Akun belum terdaftar!', 'danger');
                    return back();
                }

            } else {
                Flasher::setFlash('Masukan email dan password terlebih dahulu!', 'danger');
                return back();
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
