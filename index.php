<?php include_once 'component\header.php';


use App\Service\PDOService;
use App\Models\Movie;
use App\Repository\MovieRepository;

$database = new PDOService();
$test = new MovieRepository();


dump($test->findById(100));
dump($database->fetchMovies('SELECT * FROM movie'));
// dump($database->allMovie());
dump($database->findAll());
dump($database->newAll());