<?php include_once 'component\header.php';


use App\Service\PDOService;
use App\Models\Movie;
use App\Models\Actor;
use App\Repository\MovieRepository;
use App\Repository\ActorRepository;

$database = new PDOService();
$test = new MovieRepository();
$yo = new ActorRepository();
$yo->findAllActorsToModel();
dump($yo);
dump($test);


$film = new Movie();
$brad = new Actor();
$brad->setFirstName('jean');

$brad->setLastName('dujardin');
$film->addActor($brad);
// dump($film);
$film->removeActor($brad);
$film->removeActor($brad);
// dump($film);
$ee = "ee";
dump($test->findByTitle('a'));



dump($test->findById(100));
dump($database->fetchMovies('SELECT * FROM movie'));
// dump($database->allMovie());
dump($database->findAll());
dump($database->newAll());