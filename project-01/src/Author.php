<?php

namespace App;


class Author extends User
{

    public function getLastName()
    {
        return $this->lastName;
    }
}