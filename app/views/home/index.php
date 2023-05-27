
<section class="title text-center mt-5">
    <div>
        <h1 class="fw-bold text-uppercase"><a href="">Scxlyrics</a></h1>
        <p>Lyrics and translation of Anime OST, Pop, Electronic House, Jpop, Vocaloid and more.</p>
    </div>
    <form action="<?= baseUrl ?>home/search" method="POST" class="d-flex justify-content-center form-search align-items-center mt-4">
        <input class="bg-transparent me-2 search-input" name="keyword" id="keyword" type="text" placeholder="Search any lyrics..." aria-label="Search">
        <button class=" btn-search rounded-circle" type="submit"><i class='bx bx-search'></i></button>
    </form>

</section>


<section class="container section-card">
    <div class="d-flex justify-content-center row row-cols-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
        
        <?php foreach($data['lyrics'] as $lyrics) : ?>
            <div class="card-body my-2">
                <a href="" class="genre-card-link">
                    <span class="genre-card"><?= $lyrics['nama_genre'] ?></span>
                </a>
                <a href="<?= url('details/'. $lyrics['slug_lyrics']) ?>" class="text-cover-link">
                    <img class="img-card" src="<?= baseUrl ?>assets/upload/<?= $lyrics['image_cover'] ?>" alt="">
                    <div class="text-cover">
                        <span class="">[Lirik+Terjemahan] <?= $lyrics['title_lyrics'] ?></span>
                        <br>
                        <span class="lyrics-date"><?= date("d F Y", strtotime($lyrics['date_upload'])) ?></span>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>

        <!-- <div class="card-body my-2">
            <a href="" class="genre-card-link">
                <span class="genre-card">JPop</span>
            </a>
            <a href="" class="text-cover-link">
                <img class="img-card" src="<?= baseUrl ?>assets/image/cover/cover2.jpg" alt="">
                <div class="text-cover">
                    <span class="">[Lirik+Terjemahan] sumika - Porter</span>
                    <br>
                    <span class="lyrics-date">17 November 2022</span>
                </div>
            </a>
        </div>

        <div class="card-body my-2">
            <a href="" class="genre-card-link">
                <span class="genre-card">Anime</span>
            </a>
            <a href="" class="text-cover-link">
                <img class="img-card" src="<?= baseUrl ?>assets/image/cover/cover3.png" alt="">
                <div class="text-cover">
                    <span class="">[Lirik+Terjemahan] HoneyWorks feat. Capi - Kawaikute Gomen (Maaf Karena Imut)</span>
                    <br>
                    <span class="lyrics-date">28 November 2022</span>
                </div>
            </a>
        </div>

        <div class="card-body my-2">
            <a href="" class="genre-card-link">
                <span class="genre-card">Anime</span>
            </a>
            <a href="" class="text-cover-link">
                <img class="img-card" src="<?= baseUrl ?>assets/image/cover/cover4.jpg" alt="">
                <div class="text-cover">
                    <span class="">[Lirik+Terjemahan] Maximum the Hormone - Hawatari Nioku Centi (Bilah Sepanjang Dua Ratus Juta Senti)</span>
                    <br>
                    <span class="lyrics-date">28 October 2022</span>
                </div>
            </a>
        </div>

        <div class="card-body my-2">
            <a href="" class="genre-card-link">
                <span class="genre-card">Anime</span>
            </a>
            <a href="" class="text-cover-link">
                <img class="img-card" src="<?= baseUrl ?>assets/image/cover/cover5.jpg" alt="">
                <div class="text-cover">
                    <span class="">[Lirik+Terjemahan] Mafumafu - Seishun Kippu (Tiket Masa Muda)</span>
                    <br>
                    <span class="lyrics-date">26 October 2022</span>
                </div>
            </a>
        </div>

        <div class="card-body my-2">
            <a href="" class="genre-card-link">
                <span class="genre-card">JPop</span>
            </a>
            <a href="" class="text-cover-link">
                <img class="img-card" src="<?= baseUrl ?>assets/image/cover/cover6.jpg" alt="">
                <div class="text-cover">
                    <span class="">[Lirik+Terjemahan] Akiyama Kiro - SKETCH (SKETSA)</span>
                    <br>
                    <span class="lyrics-date">24 October 2022</span>
                </div>
            </a>
        </div>
         -->
        
    </div>
</section>

