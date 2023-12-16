
<section class="title text-center mt-5">
    <div>
        <h1 class="fw-bold text-uppercase"><a href="<?= url('/') ?>">Scxlyrics</a></h1>
        <p>Lyrics and translation of Anime OST, Pop, Electronic House, Jpop, Vocaloid and more.</p>
    </div>
    <form action="<?= baseUrl ?>home/search" method="POST" class="d-flex justify-content-center form-search align-items-center mt-4">
        <input class="bg-transparent me-2 search-input" name="keyword" id="keyword" type="text" placeholder="Search any lyrics..." aria-label="Search">
        <button class="btn-search rounded-circle" type="submit"><i class='bx bx-search'></i></button>
    </form>
</section>

    
<section class="container body-detail">
    <div class="row justify-content-between">
        <div class="col-8 left-detail shadow-lg">
            <div class="body-left">
                <div class="d-flex justify-content-between">
                    <div class="artist">
                        <span><?= $data['lyrics-detail']['nama_artist'] ?></span>
                    </div>
                    <div class="genre">
                        <span><?= $data['lyrics-detail']['nama_genre'] ?></span>
                    </div>
                </div>
                <div class="title-lyrics mt-3">
                    <h4>[Lirik+Terjemahan] <?= $data['lyrics-detail']['title_lyrics'] ?></h4>
                </div>
                <div class="date-lyrics">
                    <span>At <?= date('d F Y', strtotime($data['lyrics-detail']['date_upload'])) ?></span>
                </div>
                <div class="img-lyrics mt-5">
                    <img src="<?= baseUrl ?>assets/upload/<?= $data['lyrics-detail']['image_cover'] ?>" alt="">
                </div>
                <div class="audio-player d-flex justify-content-center mt-3">
                    <!-- <audio src="<?=  baseUrl ?>assets/song/RADWIMPS-KANATAHALUKA.mp3" controls></audio> -->
                </div>
                <div class="mt-5">
                    <p class="fw-bold">[Lirik, Lyrics, Lirica, Liedtext, Letras, Paroles, 歌詞, บทร้อง, лирика]</p>
                </div>

                <?php if($data['lyrics-detail']['japan_lyrics']) : ?>
                    <div class="romaji">
                        <p class="fw-bold mt-5 mb-3 text-uppercase">ROMAJI :</p>
                        <?= $data['lyrics-detail']['japan_lyrics'] ?>
                    </div>
                <?php endif; ?>
                
                <?php if($data['lyrics-detail']['english_lyrics']) : ?>
                    <div class="romaji">
                        <p class="fw-bold mt-5 mb-3 text-uppercase">ENGLISH VERSION :</p>
                        <?= $data['lyrics-detail']['english_lyrics'] ?>
                    </div>
                <?php endif; ?>
                
                <?php if($data['lyrics-detail']['indo_lyrics']) : ?> 
                    <div class="romaji">
                        <p class="fw-bold mt-5 mb-3 text-uppercase">INDONESIA :</p>
                        <?= $data['lyrics-detail']['indo_lyrics'] ?>
                    </div>
                <?php endif; ?>

                <div class="video-song mt-5 d-flex justify-content-center">
                    <iframe width="560" height="315" src="<?= $data['lyrics-detail']['link_embed'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="col-3 right-detail shadow-lg">
            <div class="body-right">
                <div class="popular">
                    <p class="">Popular Song</p>
                    <?php foreach($data['upload'] as $upload) : ?>
                        <div class="popular-list my-4">
                            <a href="<?= url('details/'. $upload['slug_lyrics']) ?>" class="d-flex">
                                <img class="popular-img" src="<?= baseUrl ?>assets/upload/<?= $upload['image_cover'] ?>" alt="">
                                <span class="popular-title text-start ms-2">[Lirik+Terjemahan] <?= $upload['title_lyrics'] ?></span>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="update">
                    <p class="">Update Song</p>
                    <?php foreach($data['upload'] as $upload) : ?>
                        <div class="update-list my-4">
                            <a href="<?= url('details/'. $upload['slug_lyrics']) ?>" class="d-flex">
                                <img class="update-img" src="<?= baseUrl ?>assets/upload/<?= $upload['image_cover'] ?>" alt="">
                                <span class="update-title text-start ms-2">[Lirik+Terjemahan] <?= $upload['title_lyrics'] ?></span>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="genre-list">
                    <p class="">Genre List</p>
                    <div class="genre-list-body my-4">
                        <?php ?>
                            <div class="my-2 d-flex flex-column justify-content-center gap-2">
                                <?php foreach($data['get-all-genre'] as $genre ) : ?>
                                    <a href="" class="genre-title"><?= $genre["nama_genre"] ?></a>
                                <?php endforeach; ?>
                            </div>
                        <?php ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
