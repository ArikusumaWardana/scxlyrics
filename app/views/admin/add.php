<div class="">


    <div class="data-header bg-light mb-4 py-3 px-4 d-flex justify-content-between align-items-center">
        <div class="head-title"><?= $data['page-title']; ?></div>
        <div class="head-link-add"><a href="<?= url('admin/') ?>" class="btn btn-danger"><i class='bx bx-arrow-back'></i></a></div>
    </div>

    <div class="add-body bg-light p-5">
        <form action="<?= url('admin/tambahAdmin/') ?>" method="post" >
            <div class="d-flex justify-content-center row">
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Username...">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Email Address...">
                </div>
            </div>
            <div class="d-flex justify-content-center row">
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Password...">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Status Akun</label>
                    <select name="status" class="form-select" aria-label="Default select example">
                        <option value="active">Aktif</option>
                        <option value="unactive">Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="mt-3 text-end">
                <button class="btn btn-primary" type="submit"><i class='bx bxs-user-plus'></i> Tambah Admin</button>
            </div>
        </form>
    </div>

</div>