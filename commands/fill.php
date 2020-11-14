<?php

require dirname(__DIR__) . '/vendor/autoload.php';

$faker = Faker\Factory::create('fr_FR');

$pdo = new PDO('mysql:dbname=LFDPA;host=localhost:8889', 'root', 'root', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);


$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');

$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');


/* $movies = [];
$programmes = [];
$categories = [];
for ($i=0; $i < 25; $i++) { 
    $pdo->exec("INSERT INTO movie SET name='{$faker->sentence()}', slug='{$faker->slug}', resume='{$faker->paragraph($nbSentences = 8, $variableNbSentences = true)}', place='actualité', photo='http://localhost:8000/img/nuit.jpg', created_at='{$faker->date} {$faker->time}'");
    $movies[] = $pdo->lastInsertId();
}

for ($i=0; $i < 10; $i++) { 
    $pdo->exec("INSERT INTO moviecategory SET name='{$faker->word}', slug='{$faker->slug}'");
    $categories[] = $pdo->lastInsertId();
}

for ($i=0; $i < 5; $i++) { 
    $pdo->exec("INSERT INTO programme SET date='{$faker->date} {$faker->time}', slug='{$faker->slug}'");
    $programmes[] = $pdo->lastInsertId();
}

foreach($movies as $movie){
    $randomCategories = $faker->randomElements($categories, rand(0, count($categories)));
    $randomProgrammes = $faker->randomElements($programmes, rand(0, count($programmes)));

    foreach($randomCategories as $category){
        $pdo->exec("INSERT INTO movie_has_moviecategory SET movie_id=$movie, moviecategory_id=$category");
    }

    foreach($randomProgrammes as $programme){
        $pdo->exec("INSERT INTO movie_has_programme SET movie_id=$movie, programme_id=$programme");
    }
} */

//, content='{$faker->paragraph($nbSentences = 8, $variableNbSentences = true)}', place='actualité', photo='http://localhost:8000/img/nuit.jpg', created_at='{$faker->date} {$faker->time}'


//php commands/fill.php