<?php

namespace App\Domain;


use App\Infrastructure\FakeDatabase;
use Illuminate\Support\Collection;

class Imprint
{
    private $db;

    /**
     * @param FakeDatabase $db
     */
    public function __construct(FakeDatabase $db)
    {
        $this->db = $db;
    }

    /**
     * @return Collection
     */
    public function listPublishedPosts()
    {
        return $this->db->posts();
    }
}