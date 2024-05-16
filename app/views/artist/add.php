<div class="">


    <div class="data-header bg-light mb-4 py-3 px-4 d-flex justify-content-between align-items-center">
        <div class="head-title"><?= $data['page-title']; ?></div>
        <div class="head-link-add"><a href="<?= url('artist/') ?>" class="btn btn-danger"><i class='bx bx-arrow-back'></i></a></div>
    </div>

    <div class="add-body bg-light p-5">
        <form action="<?= url('artist/store/') ?>" method="post" >
            <div class=""><?php Flasher::flash() ?></div>
            <div class="d-flex justify-content-center row">
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Nama Artist</label>
                    <input type="text" name="artist_name" id="name" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama Artist...">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Slug Artist</label>
                    <input type="text" name="artist_slug" id="slug" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Slug Artist...">
                </div>
            </div>
            <div class="form-floating mb-3 mt-4">
                <input id="trix" type="hidden" name="artist_desc" placeholder="Artist Description">
                <trix-editor input="trix"></trix-editor>
            </div>
            <div class="mt-3 text-end">
                <button class="btn btn-primary" type="submit"><i class='bx bx-user-plus'></i> Tambah Artist</button>
            </div>
        </form>
    </div>

</div>