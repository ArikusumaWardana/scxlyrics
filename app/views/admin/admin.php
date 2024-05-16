<div class="">

    <div class="shadow data-header bg-light mb-4 py-3 px-4 d-flex justify-content-between align-items-center">
        <div class="head-title"><?= $data['page-title']; ?></div>
        <div class="head-link-add"><a href="<?= url('admin/add/') ?>" class="btn btn-primary"><i class='bx bxs-user-plus'></i></a></div>
    </div>

    <div class="my-2 shadow-lg"><?php Flasher::flash(); ?></div>

    <table class="shadow-lg table table-striped table-light" id="dataTable">
    <thead>
        <tr class="text-center">
        <th class="py-3 text-center" scope="col">No</th>
        <th class="py-3 text-center" scope="col">Username</th>
        <th class="py-3 text-center" scope="col">Email</th>
        <th class="py-3 text-center" scope="col">Status</th>
        <th class="py-3 text-center" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['all-admin'] as $i => $admin ) : ?>
            <tr class="text-center">
                <th scope="row"><?= $i+1; ?></th>
                <td><?= $admin['admin_name']; ?></td>
                <td><?= $admin['admin_email']; ?></td>
                <td>
                    <?php if($admin['status'] == 'active') : ?>
                        <span class="text-primary fw-bold">Aktif</span>
                    <?php elseif($admin['status'] == 'inactive') : ?>
                        <span class="text-danger fw-bold">Tidak Aktif</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= url('admin/edit/'.$admin['admin_id']) ?>" class="btn btn-warning text-white"><i class='bx bx-edit'></i></a>
                    <a href="" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#deleteAdminModal<?= $admin['admin_id'] ?>"><i class='bx bxs-trash-alt'></i></a>


                        <!-- Modal -->
                        <div class="modal fade" id="deleteAdminModal<?= $admin['admin_id'] ?>" tabindex="-1" aria-labelledby="deleteAdminModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form action="<?= url('admin/delete/'.$admin['admin_id']) ?>" method="post">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="">
                                            <table style="border-left: 2px solid red;">
                                                <tr class="text-start">
                                                    <td>Username</td>
                                                    <td>:</td>
                                                    <td><?= $admin['admin_name']; ?></td>
                                                </tr>
                                                <tr class="text-start">
                                                    <td>Email</td>
                                                    <td>:</td>
                                                    <td><?= $admin['admin_email']; ?></td>
                                                </tr>
                                                <tr class="text-start">
                                                    <td>Status</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php if($admin['status'] == 'active') : ?>
                                                        <span class="text-primary fw-bold">Aktif</span>
                                                        <?php elseif($admin['status'] == 'inactive') : ?>
                                                        <span class="text-danger fw-bold">Tidak Aktif</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete Data</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>

</div>