<?php

namespace App\Domain;


class Author extends User
{

    public function __construct($email, $password, $key)
    {
        parent::__construct($email, $password);

        if ($key != 'AUTHOR') {
            throw new \InvalidArgumentException("Invalid argument key.");
        }
    }

    public function getLastName()
    {
        return $this->lastName;
    }
}