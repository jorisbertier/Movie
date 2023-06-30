<?php include_once 'component\header.php';


use App\Service\PDOService;
use App\Models\Movie;
use App\Models\Actor;
use App\Repository\MovieRepository;
use App\Repository\ActorRepository;

$database = new PDOService();

$movieRepository = new MovieRepository();
$actorRepository = new ActorRepository();
$yo = ($movieRepository->findAll());
$object = json_decode(json_encode($yo));
echo gettype($object);
