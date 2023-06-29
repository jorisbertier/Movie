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

$troiscent = $movieRepository->findById(1);

dump($troiscent);

$troiscent->setTitle(400);
$releaseDate = DateTime::createFromFormat('Y-m-d', '2001-01-01');
$troiscent->setReleaseDate($releaseDate);

$movieRepository->updateMovie($troiscent);
