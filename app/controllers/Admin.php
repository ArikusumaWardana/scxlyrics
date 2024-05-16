<?php 

    Class Admin extends Controller {

        public function index() {

            $data = [
                'page-title' => 'Admin Data',
                'all-admin' => $this->model('AdminModel')->getAllAdmin()
            ];

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

        public function store() {

            $adminpost = $_POST['username'] && $_POST['email'] && $_POST['password'] && $_POST['status'];
 
            if(!empty($adminpost)) {

                if($this->model('AdminModel')->addAdmin($_POST) > 0) {
                    Flasher::setFlash('Admin berhasil ditambahkan!', 'success');
                    return redirect('admin/');
                } else {
                    Flasher::setFlash('Admin gagal ditambahkan!', 'danger');
                    back();
                }

            } else {

                Flasher::setFlash('Isikan data terlebih dahulu!', 'warning');
                return back();

            }

        }

        public function edit($id) {
            
            $data = [
                'page-title' => 'Edit Admin',
                'get-admin' => $this->model('AdminModel')->getAdminById($id)
            ];

            $this->view('templates/header-admin', $data);
                $this->view('admin/edit', $data);
            $this->view('templates/footer-admin');

        }

        public function update($id) {

            $adminpost = $_POST['username'] && $_POST['email'] && $_POST['status'];


            if(!empty($adminpost)) {

                if($this->model('AdminModel')->updateAdmin($id) > 0) {
                    Flasher::setFlash('Data admin berhasil diperbaharui!', 'success');
                    return redirect('admin/');
                } else {
                    Flasher::setFlash('Data admin gagal diperbaharui', 'danger');
                    return back();
                }

            } else {
                
                Flasher::setFlash('Isikan data terlebih dahulu!', 'warning');
                return back();

            }

        }

        public function delete($id) {

            if($this->model('AdminModel')->deleteAdmin($id) > 0 ) {
                return redirect('admin');
            } else {
                return back();
            }
        }

    }