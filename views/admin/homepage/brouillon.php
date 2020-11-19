homepagebuilder l150

<?php if((int)$movie->place === 1) : ?>
    <td class="col-auto align-middle text-white">
        <form action="" method="POST">
            <input style="display:none" class="form-control" type="input" name="query" value="suppr">
            <input style="display:none" class="form-control" type="input" name="type" value="movie">
            <input style="display:none" class="form-control" type="input" name="id" value="<?= $movie->id ?>">
            <input style="display:none" class="form-control" type="input" name="place" value="<?= (int)$movie->place ?>">
            <button class="btn btn-danger font-weight-lighter rounded-0" type="submit">-</button>
        </form>
    </td>
<?php else : ?>
    <td class="col-auto align-middle text-white">
        <form action="" method="POST">
            <input style="display:none" class="form-control" type="input" name="query" value="add">
            <input style="display:none" class="form-control" type="input" name="type" value="movie">
            <input style="display:none" class="form-control" type="input" name="id" value="<?= $movie->id ?>">
            <input style="display:none" class="form-control" type="input" name="place" value="<?= (int)$movie->place ?>">
            <button class="btn btn-success font-weight-lighter rounded-0" type="submit">+</button>
        </form>
    </td>
<?php endif ?>  