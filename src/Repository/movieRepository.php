<?php

namespace App\Repository;

use App\Models\Movie;
use App\Service\PDOService;
use PDO;

class MovieRepository
{
    private PDOService $PDOService;
    private string $queryAll = 'SELECT * FROM movie';

    public function __construct()
    {
        $this->PDOService = new PDOService();
    }


    public function findAll():array
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchAll();
    }

    public function findFirstMovieToModel():Movie
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchObject(Movie::class);
    }

    public function findAllMoviesToModel():array
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchAll(PDO::FETCH_CLASS, Movie::class);
    }

    public function findById(int $id) : Movie | bool
    {
        $query = $this->PDOService->getPDO()->prepare('SELECT * FROM movie WHERE id = ?');
        $query->bindValue(1, $id);
        $query->execute();
        return $query->fetchObject(Movie::class);
    }

    public function findByTitle(string $title) : array
    {
        $query = $this->PDOService->getPDO()->prepare('SELECT * FROM movie WHERE title LIKE :title');
        $like = '%'.$title.'%';
        $query->bindParam(':title', $like);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, Movie::class);
    }

    public function addMovieDatabase(Movie $movie) : Movie
    {
            $query = $this->PDOService->getPDO()->prepare('INSERT INTO movie VALUE (null, :title,:releaseDate)');
            $title = $movie->getTitle();
            $releaseDate = $movie->getReleaseDate();
            $releaseDateFormat = $releaseDate->format('Y-m-d');
            $query->bindParam(':title', $title);
            $query->bindParam(':releaseDate', $releaseDateFormat);
            $query->execute();
            return $movie;
    }
    
    //  Pas la bonne méthode
    // public function addActorAndMovie(Movie $movie, Actor $actor) : object
    // {
    //         $query = $this->PDOService->getPDO()->prepare('INSERT INTO movie_actor VALUE (null, :title,:actor)');
    //         $movie = $movie->getId();
    //         $actor = $actor->getId();
    //         $query->bindParam(':movie', $movie);
    //         $query->bindParam(':releaseDate', $actor);
    //         $query->execute();
    //         return $movie;
    // }

    public function addActorAndMovie(Movie $movie)
    {
        $actor = $movie->getActors();
        foreach($actor as $item) 
        {
            dump($item);
            dump($movie);
            $query = $this->PDOService->getPDO()->prepare('INSERT INTO movie_actor VALUE (null, :idActor,:idFilm)');
            $idActor = $item->getId();
            $idFilm = $movie->getId();
            $query->bindParam(':idActor', $idActor);
            $query->bindParam(':idFilm', $idFilm);
            $query->execute();
        }
        return $movie;
        // dump($movie->getId());

        // $query = $this->PDOService->getPDO()->prepare('INSERT INTO actor VALUE (null, :firstName,:lastName)');
        // $firstName = $actor->getFirstName();
        // $lastName = $actor->getLastName();
        // $query->bindParam(':firstName', $firstName);
        // $query->bindParam(':lastName', $lastName);
        // $query->execute();
        // return $actor; ,, 
    }

    public function removeMovie(Movie $movie)
    {
        $query = $this->PDOService->getPDO()->prepare('DELETE FROM movie WHERE id = :idMovie');
        $idMovie = $movie->getId();
        $query->bindParam(':idMovie', $idMovie);
        $query->execute();
        return $movie;
    }

}
