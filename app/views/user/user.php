<div class="">

    <div class="shadow data-header bg-light mb-4 py-3 px-4 d-flex justify-content-between align-items-center">
        <div class="head-title"><?= $data['page-title']; ?></div>
        <div class="head-link-add"><a href="<?= url('admin/add/') ?>" class="btn btn-primary"><i class='bx bxs-user-plus'></i></a></div>
    </div>

    <table class="shadow-lg table table-striped table-light" id="dataTable">
    <thead>
        <tr class="text-center">
        <th class="py-3 text-center" scope="col">No</th>
        <th class="py-3 text-center" scope="col">Username</th>
        <th class="py-3 text-center" scope="col">Name</th>
        <th class="py-3 text-center" scope="col">Email</th>
        <th class="py-3 text-center" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['all-user'] as $i => $user ) : ?>
            <tr class="text-center">
                <th scope="row"><?= $i+1; ?></th>
                <td><?= $user['username']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['email_user']; ?></td>
                <td>
                    <a href="" class="btn btn-danger text-white"><i class='bx bxs-trash-alt'></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>

</div>