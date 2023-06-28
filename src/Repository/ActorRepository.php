<?php 

namespace App\Repository;

use App\Models\Actor;
use App\Service\PDOService;
use PDO;

class ActorRepository
{
    private PDOService $PDOService;
    private string $queryAll = 'SELECT * FROM actor';

    public function __construct()
    {
        $this->PDOService = new PDOService();
    }


    public function findAll():array
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchAll();
    }

    public function findFirstActorToModel():Actor
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchObject(Actor::class);
    }

    public function findAllActorsToModel():array
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchAll(PDO::FETCH_CLASS, Actor::class);
    }

    public function findById(int $id) : Actor | bool
    {
        $query = $this->PDOService->getPDO()->prepare('SELECT * FROM actor WHERE id = ?');
        $query->bindValue(1, $id);
        $query->execute();
        return $query->fetchObject(MovActorie::class);

    }

}