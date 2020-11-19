<div class="m-auto h-100" style="background-image: url(<?= $movie_homepage->photo ?>); background-size: cover; background-position: center; <?php if($title === "Homepage builder") : ?> width:15rem;height:15rem;<? endif ?>">
    <div class="mask-film h-100 w-100 d-flex flex-column justify-content-center align-items-center">
    <?php if($title !== "Personnalisation page d'accueil") : ?>
        <h1 class="text-uppercase text-center font-weight-bold text-white"><?= $movie_homepage->name ?></h1>
        <p class="font-weight-light text-center text-white"><?= substr($movie_homepage->resume, 0, 150) ?></p>
        <a class="mb-5 btn btn-dark font-weight-lighter rounded-0" href="<?= $router->generate('movie_page', ['slug' => $movie_homepage->slug, 'id' => $movie_homepage->id])?>">En savoir plus</a>
    <?php endif ?>
    </div>
</div>