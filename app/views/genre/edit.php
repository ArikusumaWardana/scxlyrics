<div class="">


    <div class="data-header bg-light mb-4 py-3 px-4 d-flex justify-content-between align-items-center">
        <div class="head-title"><?= $data['page-title']; ?></div>
        <div class="head-link-add"><a href="<?= url('genre/') ?>" class="btn btn-danger"><i class='bx bx-arrow-back'></i></a></div>
    </div>

    <div class="add-body bg-light p-5">
        <form action="<?= url('genre/update/'. $data['get-genre']['genre_id']) ?>" method="post" >
            <div class=""><?php Flasher::flash() ?></div>
            <div class="d-flex justify-content-center row">
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Nama Genre</label>
                    <input type="text" name="genre_name" id="name" value="<?= $data['get-genre']['genre_name'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama Genre...">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Slug Genre</label>
                    <input type="text" name="genre_slug" id="slug" value="<?= $data['get-genre']['genre_slug'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Slug Genre...">
                </div>
            </div>
            <div class="form-floating mb-3 mt-4">
                <!-- <textarea class="form-control" name="genre_desc" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"></textarea> -->
                <!-- <label>Genre Description</label>  -->
                <input id="trix" type="hidden" name="genre_desc" placeholder="Genre Description" value="<?= $data['get-genre']['genre_description'] ?>">
                <trix-editor input="trix"></trix-editor>
            </div>
            <div class="mt-3 text-end">
                <button class="btn btn-primary" type="submit"><i class='bx bxs-folder-plus'></i> Update Genre</button>
            </div>
        </form>
    </div>

</div>