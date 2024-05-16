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
        <th class="py-3 text-center" scope="col">Artist Description</th>
        <th class="py-3 text-center" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['all-artist'] as $key => $artist) : ?>

        <tr class="text-center">
            <th scope="col"><?= $key+1; ?></th>
            <td><?= $artist['artist_name']; ?></td>
            <td><?= mb_strimwidth($artist['artist_desc'], 0, 40, '...') ?></td>
            <td>
                <a href="<?= url('artist/edit/'. $artist['artist_id']) ?>" class="btn btn-warning text-white"><i class='bx bx-edit'></i></a>
                <a href="" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $artist['artist_id'] ?>"><i class='bx bxs-trash-alt'></i></a>
            
                <!-- Modal -->
                <div class="modal fade" id="deleteModal<?= $artist['artist_id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <form action="<?= url('artist/delete/'.$artist['artist_id']) ?>" method="post">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="">
                                    <table style="border-left: 2px solid red;">
                                        <tr class="text-start">
                                            <td>Artist Name</td>
                                            <td>:</td>
                                            <td><?= $artist['artist_name']; ?></td>
                                        </tr>
                                        <tr class="text-start">
                                            <td>Artist Description</td>
                                            <td>:</td>
                                            <td><?= $artist['artist_desc']; ?></td>
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