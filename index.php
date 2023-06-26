<?php include_once 'component\header.php';


use App\Service\PDOService;

$database = new PDOService();

dump($database->allMovie());