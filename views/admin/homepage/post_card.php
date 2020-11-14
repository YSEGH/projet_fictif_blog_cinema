  <div class="card-home mx-2 border-0 d-flex flex-column justify-content-center align-items-center" <?php if ($title === "Homepage builder") : ?>style="width: 15rem;"<?php endif ?>>    
    <div class="card-header-home p-0 rounded-0" style="background-image: url(<?= $post_homepage->photo ?>);<?php if ($title === "Homepage builder") : ?> width: 10rem; height: 10rem<?php endif ?>"></div>
    <div class="card-body my-4">
        <p class="text-uppercase font-weight-normal text-dark"><?= $post_homepage->title ?> <span class="font-weight-lighter">text</span></p>
        <p class="text-justify font-weight-light text-dark">
            <?php if ($title !== "Homepage builder") : ?>
                <?= $post_homepage->content ?>
            <?php else : ?>
                <?= substr($post_homepage->content, 0, 60) ?>
            <?php endif ?>
        </p>  
    <?php if ($title !== "Homepage builder") : ?>
        <button class="btn btn-dark rounded-0 my-3 ml-auto font-weight-lighter">En savoir plus</button>
    <?php endif ?>
    </div>
  </div>