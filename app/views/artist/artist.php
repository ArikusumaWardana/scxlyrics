<div class="">

    <div class="shadow data-header bg-light mb-4 py-3 px-4 d-flex justify-content-between align-items-center">
        <div class="head-title"><?= $data['page-title']; ?></div>
        <div class="head-link-add"><a href="<?= url('artist/add/') ?>" class="btn btn-primary"><i class='bx bx-user-plus'></i></a></div>
    </div>

    <div class="my-2 shadow-lg"><?php Flasher::flash(); ?></div>

    <table class="shadow-lg table table-striped table-light" id="dataTable">
    <thead>
        <tr class="text-center">
        <th class="py-3 text-center" scope="col">No</th>
        <th class="py-3 text-center" scope="col">Artist Name</th>
        <th class="py-3 text-center" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
    </table>

</div>