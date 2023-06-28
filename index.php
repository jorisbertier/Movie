<?php include_once 'component\header.php';


use App\Service\PDOService;
use App\Models\Movie;
use App\Models\Actor;
use App\Repository\MovieRepository;
use App\Repository\ActorRepository;

$database = new PDOService();
// $movie = new MovieRepository();
// $actor = new ActorRepository();


$movieRepository = new MovieRepository();
$actorRepository = new ActorRepository();

// $movie = $movieRepository->findById(4);

$actor1 = $actorRepository->findById(3);
// $actor2 = $actorRepository->findById(2);

// $movie->addActor($actor1);
// $movie->addActor($actor2);

// $movieRepository->addActorAndMovie($movie);

$actorRepository->removeActor($actor1);