
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
                    <span class="genre-card"><?= $lyrics['genre_name'] ?></span>
                </a>
                <a href="<?= url('details/'. $lyrics['lyrics_slug']) ?>" class="text-cover-link">
                    <img class="img-card" src="<?= baseUrl ?>assets/upload/<?= $lyrics['image_cover'] ?>" alt="">
                    <div class="text-cover">
                        <span class="">[Lirik+Terjemahan] <?= $lyrics['lyrics_title'] ?></span>
                        <br>
                        <span class="lyrics-date"><?= date("d F Y", strtotime($lyrics['date_upload'])) ?></span>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
        
    </div>
</section>

