<?php

namespace App\Models;

use Datetime;

class Movie 
{
    private string $title;
    private Datetime $releaseDate;


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

}