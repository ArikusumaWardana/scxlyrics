<div class="">


    <div class="data-header bg-light mb-4 py-3 px-4 d-flex justify-content-between align-items-center">
        <div class="head-title"><?= $data['page-title']; ?></div>
        <div class="head-link-add"><a href="<?= url('admin/') ?>" class="btn btn-danger"><i class='bx bx-arrow-back'></i></a></div>
    </div>

    <div class="add-body bg-light p-5">
        <form action="<?= url('admin/update/'. $data['get-admin']['id_admin']) ?>" method="post" >
        <div class=""><?php Flasher::flash(); ?></div>
            <div class="d-flex justify-content-center row">
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input value="<?= $data['get-admin']['username'] ?>" type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Username...">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input value="<?= $data['get-admin']['email_admin'] ?>" type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Email Address...">
                </div>
            </div>
            <div class="d-flex justify-content-center row">

                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Status Akun</label>
                    <select name="status" class="form-select" aria-label="Default select example">
                        <option value="active" <?= $data['get-admin']['status'] == 'active' ? 'selected' : '' ?> >Aktif</option>
                        <option value="unactive" <?= $data['get-admin']['status'] == 'unactive' ? 'selected' : '' ?> >Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="mt-3 text-end">
                <button class="btn btn-primary" type="submit"><i class='bx bxs-user-plus'></i> Update Admin</button>
            </div>
        </form>
    </div>

</div>