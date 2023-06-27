<?php include_once 'component\header.php';


use App\Service\PDOService;
use App\Models\Movie;

$database = new PDOService();

dump($database->allMovie());
dump($database->findAll());