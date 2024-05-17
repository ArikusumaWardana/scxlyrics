<div class="">

    <div class="shadow data-header bg-light mb-4 py-3 px-4 d-flex justify-content-between align-items-center">
        <div class="head-title"><?= $data['page-title']; ?></div>
        <div class="head-link-add"><a href="<?= url('lyrics/add/') ?>" class="btn btn-primary"><i class='bx bxs-folder-plus'></i></a></div>
    </div>

    <div class="my-2 shadow-lg"><?php Flasher::flash(); ?></div>

    <table class="shadow-lg table table-striped table-light" id="dataTable">
    <thead>
        <tr class="text-center">
        <th class="py-3 text-center" scope="col">No</th>
        <th class="py-3 text-center" scope="col">Lyrics Title</th>
        <th class="py-3 text-center" scope="col">Genre</th>
        <th class="py-3 text-center" scope="col">Artist</th>
        <th class="py-3 text-center" scope="col">Upload Date</th>
        <th class="py-3 text-center" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['all-lyrics'] as $key => $lyrics) : ?>

        <tr class="text-center">
            <th scope="col"><?= $key+1; ?></th>
            <td><?= $lyrics['lyrics_title']; ?></td>
            <td><?= $lyrics['genre_name']; ?></td>
            <td><?= $lyrics['artist_name']; ?></td>
            <td><?= date('d F Y', strtotime($lyrics['date_upload'])) ?></td>
            <td>
                <a href="<?= url('details/'. $lyrics['lyrics_slug']) ?>" class="btn btn-primary text-white"><i class='bx bx-detail'></i></a>
                <a href="<?= url('lyrics/edit/'. $lyrics['id_lyrics']) ?>" class="btn btn-warning text-white"><i class='bx bx-edit'></i></a>
                <a href="" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $lyrics['id_lyrics'] ?>"><i class='bx bxs-trash-alt'></i></a>
            </td>
        </tr>

        <?php endforeach; ?>
    </tbody>
    </table>

</div>