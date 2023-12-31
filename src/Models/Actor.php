<?php

namespace App\Models;

class Actor
{
    private int $id;
    private string $firstName;
    private string $lastName;

    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id) : void 
    {
        $this->id = $id;
    }
    
    public function getFirstName() : string
    {
        return $this->firstname;
    }

    public function setFirstName(string $firstName): void 
    {
        $this->firstname = $firstName;
    }

    public function getLastName() : string
    {
        return $this->lastname;
    }

    public function setLastName(string $lastName): void 
    {
        $this->lastname = $lastName;
    }
}