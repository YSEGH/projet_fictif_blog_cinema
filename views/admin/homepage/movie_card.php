<div class="film m-4" style="background-image: url(<?= $movie_homepage->photo ?>); background-size: cover; background-position: center; <?php if($title === "Homepage builder") : ?> width:15rem;height:15rem;<? endif ?>">
    <div class="mask-film h-100 w-100 d-flex flex-column justify-content-center align-items-center">
        <h1 class="text-uppercase font-weight-bold text-white my-auto"><?= $movie_homepage->name ?></h1>
    </div>
</div>