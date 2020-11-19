<div class="card-post-photo mb-1 p-0 rounded-0 col-md-12" style="background-image: url(<?= $post->photo ?>);"></div>
<div class="card-post-body card-body col-12 my-4 m-auto text-center d-flex flex-column align-items-center justify-content-around">
    <h6 class="card-post-title text-uppercase font-weight-normal text-white m-1"><?= $post->title ?></h6>
    <div class="card-post-span"></div>
    <p class="card-post-content text-justify text-center text-white m-1"><?= substr($post->content, 0, 60) ?></p>
    <div class="card-post-span"></div>
    <p class="card-post-date font-weight-lighter text-white m-0"><?= $post->getCreatedAt()->format('d F Y') ?></p>
</div>
<div class="card-post-footer d-flex justify-content-center">
    <?php if ($title !== "Homepage builder") : ?>
        <button class="btn btn-dark rounded-0 border-0 my-3 font-weight-lighter">En savoir plus</button>
    <?php endif ?>
</div>
