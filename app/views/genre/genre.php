<div class="">

    <div class="shadow data-header bg-light mb-4 py-3 px-4 d-flex justify-content-between align-items-center">
        <div class="head-title"><?= $data['page-title']; ?></div>
        <div class="head-link-add"><a href="<?= url('genre/add/') ?>" class="btn btn-primary"><i class='bx bxs-folder-plus'></i></a></div>
    </div>

    <div class="my-2 shadow-lg"><?php Flasher::flash(); ?></div>

    <table class="shadow-lg table table-striped table-light" id="dataTable">
    <thead>
        <tr class="text-center">
        <th class="py-3 text-center" scope="col">No</th>
        <th class="py-3 text-center" scope="col">Nama</th>
        <th class="py-3 text-center" scope="col">Description</th>
        <th class="py-3 text-center" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr class="text-center">
            <th scope="col">1</th>
            <td>Action</td>
            <td>Lorem, ipsum dolor sit am</td>
            <td>
                <a href="" class="btn btn-warning text-white"><i class='bx bx-edit'></i></a>
                <a href="" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#deleteAdminModal"><i class='bx bxs-trash-alt'></i></a>
            </td>
        </tr>
    </tbody>
    </table>

</div>