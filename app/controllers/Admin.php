<?php 

    Class Admin extends Controller {

        public function index() {

            $data['page-title'] = 'Admin Data';
            $data['all-admin'] = $this->model('AdminModel')->getAllAdmin();

            $this->view('templates/header-admin', $data);
                $this->view('admin/admin', $data);
            $this->view('templates/footer-admin');
            
        }

        public function add() {
            
            $data['page-title'] = 'Tambah Admin';

            $this->view('templates/header-admin', $data);
                $this->view('admin/add', $data);
            $this->view('templates/footer-admin');

        }

        public function tambahAdmin() {
            if($this->model('AdminModel')->addAdmin($_POST) > 0) {
                redirect('admin/');
            } else {
                back();
            }
        }

        public function edit($id) {
            
            $data['page-title'] = 'Edit Admin';
            $data['get-admin'] = $this->model('AdminModel')->getAdminById($id);

            $this->view('templates/header-admin', $data);
                $this->view('admin/edit', $data);
            $this->view('templates/footer-admin');

        }

        public function updateAdmin($id) {
            if($this->model('AdminModel')->updateAdmin($id, $_POST) > 0) {
                redirect('admin');
            } else {
                back();
            }
        }

        public function delete($id) {

            if($this->model('AdminModel')->deleteAdmin($id) > 0 ) {
                redirect('admin');
            } else {
                back();
            }
        }

    }