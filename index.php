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


$jean = $actorRepository->findById(7);



$jean->setFirstName('Marion');
$jean->setLastName('Cotillard');

$actorRepository->updateActor($jean);

dump($jean);