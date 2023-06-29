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
        return $query->fetchObject(Actor::class);
    }

    public function addActorDatabase(Actor $actor) : Actor 
    {
        $query = $this->PDOService->getPDO()->prepare('INSERT INTO actor VALUE (null, :firstName,:lastName)');
        $firstName = $actor->getFirstName();
        $lastName = $actor->getLastName();
        $query->bindParam(':firstName', $firstName);
        $query->bindParam(':lastName', $lastName);
        $query->execute();
        return $actor;
    }

    public function removeActor(Actor $actor)
    {
        $query = $this->PDOService->getPDO()->prepare('DELETE FROM actor WHERE id = :idActor');
        $idActor = $actor->getId();
        $query->bindParam(':idActor', $idActor);
        $query->execute();
        return $actor;
    }

    public function updateActor(Actor $actor) : Actor
    {
        $query = $this->PDOService->getPDO()->prepare('UPDATE actor SET first_name= :firstName , last_name = :lastName WHERE id = :idActor');
        $idActor = $actor->getId();
        $firstName= $actor->getFirstName();
        $lastName = $actor->getLastName();

        $query->bindParam(':idActor', $idActor);
        $query->bindParam(':firstName', $firstName);
        $query->bindParam(':lastName', $lastName);
        $query->execute();
        return $actor;
    }
}