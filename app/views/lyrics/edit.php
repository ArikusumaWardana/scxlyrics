<div class="">


    <div class="data-header bg-light mb-4 py-3 px-4 d-flex justify-content-between align-items-center">
        <div class="head-title"><?= $data['page-title']; ?></div>
        <div class="head-link-add"><a href="<?= url('lyrics/') ?>" class="btn btn-danger"><i class='bx bx-arrow-back'></i></a></div>
    </div>

    <div class="add-body bg-light p-5">
        <form action="<?= url('lyrics/store/') ?>" method="post" enctype="multipart/form-data">
            <div class=""><?php Flasher::flash() ?></div>
            <div class="d-flex justify-content-center row mb-4">
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Judul Lyrics</label>
                    <input type="text" name="lyrics_title" value="<?= $data['get-lyrics']['title_lyrics'] ?>" id="name" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama Genre...">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Slug Lyrics</label>
                    <input type="text" name="lyrics_slug" value="<?= $data['get-lyrics']['slug_lyrics'] ?>" id="slug" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Slug Genre...">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Genre</label>
                    <select class="form-select" aria-label="Default select example" name="genre_lyrics">
                        <option>Pilih Genre</option>
                        <?php foreach($data['all-genre'] as $genre) : ?>
                            <option value="<?= $genre['id_genre'] ?>" <?php if($data['get-lyrics']['id_genre'] == $genre['id_genre']) : ?> selected <?php endif; ?>><?= $genre['nama_genre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Artist</label>
                    <select class="form-select" aria-label="Default select example" name="artist_lyrics">
                        <option>Pilih Artist</option>
                        <?php foreach($data['all-artist'] as $artist) : ?>
                            <option value="<?= $artist['id_artist'] ?>" <?php if($data['get-lyrics']['id_artist'] == $artist['id_artist']) : ?> selected <?php endif; ?> ><?= $artist['nama_artist'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Image Cover</label>
                    <input type="file" name="img_cover" id="name" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama Genre...">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Upload Date</label>
                    <input type="date" name="upload_date" value="<?= $data['get-lyrics']['date_upload'] ?>" id="name" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama Genre...">
                </div>
            </div>

            <div class="mb-5">
                <label for="exampleFormControlInput1" class="form-label fw-bold">Japan Lyrics</label>
                <div class="form-floating">
                    <input id="japan" type="hidden" name="japan_lyrics" value='<?= $data['get-lyrics']['japan_lyrics'] ?>'>
                    <trix-editor input="japan"></trix-editor>
                </div>
            </div>
            <div class="mb-5">
                <label for="exampleFormControlInput1" class="form-label fw-bold">English Lyrics</label>
                <div class="form-floating">
                    <input id="english" type="hidden" name="english_lyrics" value='<?= $data['get-lyrics']['english_lyrics'] ?>'>
                    <trix-editor input="english"></trix-editor>
                </div>
            </div>
            <div class="mb-5">
                <label for="exampleFormControlInput1" class="form-label fw-bold">Indonesia Lyrics</label>
                <div class="form-floating">
                    <input id="indo" type="hidden" name="indonesia_lyrics" value='<?= $data['get-lyrics']['indo_lyrics']; ?>'>
                    <trix-editor input="indo"></trix-editor>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Link Embed Youtube</label>
                <input type="text" name="embed_link" value="<?= $data['get-lyrics']['link_embed'] ?>" id="embed_link" class="form-control" id="exampleFormControlInput1" placeholder="Masukan link embed...">
            </div>
            <div class="mt-3 text-end">
                <button class="btn btn-primary" type="submit"><i class='bx bxs-folder-plus'></i> Tambah Lyrics</button>
            </div>
        </form>
    </div>

</div>