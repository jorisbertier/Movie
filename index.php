<?php include_once 'component\header.php';


use App\Service\PDOService;
use App\Models\Movie;
use App\Models\Actor;
use App\Repository\MovieRepository;
use App\Repository\ActorRepository;

$database = new PDOService();
$movie = new MovieRepository();
$actor = new ActorRepository();
$actor->findAllActorsToModel();
// dump($actor);
// dump($movie);


$film = new Movie();
$brad = new Actor();
$pamela = new Actor();
$brad->setFirstName('jean');
$brad->setLastName('dujardin');
$pamela->setFirstName('pamela');
$pamela->setLastName('anderson');
$pamela->setId(15);

// dump($film);
$film->removeActor($brad);
$film->removeActor($brad);
$film->setTitle('Seigneur des anneaux');
$film->setId(30);

$releaseDate = DateTime::createFromFormat('Y-m-d', '2000-01-01');
$film->setReleaseDate($releaseDate);

// $film->addActor($brad);
$film->addActor($pamela);

$movie->addActorAndMovie($film);


// $movie->addMovieDatabase($film);
// $actor->addActorDatabase($brad);