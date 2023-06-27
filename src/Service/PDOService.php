<?php

namespace App\Service;

use PDO;

use App\Models\Movie;

class PDOService
{
    private PDO $pdo;

    private string $dsn = 'mysql:host=127.0.0.1:3306;dbname=allocinee';
    private string $user = 'root';
    private string $password = '';

    public function __construct()
    {
        $this->pdo = new PDO($this->dsn, $this->user, $this->password);
    }

    public function getPDO(): PDO
    {
        return $this->pdo;
    }

    public function getDsn(): string
    {
        return $this->dsn;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function fetchMovies(string $string)
    {
        return $this->pdo->query($string)->fetchAll(PDO::FETCH_CLASS, Movie::class);
    }

    public function allMovie() : object
    {
        
        return $this->pdo->query('SELECT * FROM movie')->fetchObject();
    }

    public function findAll() 
    {
        $query = $this->pdo->query('SELECT * FROM movie');
        return $query->fetchObject(Movie::class);
    }
     
    public function newAll() 
    {
        $query = $this->pdo->query('SELECT * FROM movie');
        return $query->fetchAll(PDO::FETCH_CLASS, Movie::class);
    }
    
}
