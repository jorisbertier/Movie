<?php

namespace App\Models;

use Datetime;
use App\Models\Actor;

class Movie 
{
    private string $title;
    private Datetime $releaseDate;
    private array $actors = [];


    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    public function getReleaseDate() : Datetime
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(Datetime $releaseDate) : void
    {
        $this->releaseDate = $releaseDate;
    }

    public function addActor(Actor $actor) : void
    {
        $this->actors[] = $actor;
    }

    public function removeActor(Actor $actor)
    {
        // if(array_search($actor, $this->actors) == true){
        unset($this->actors, $actor);
        // }

    }
}