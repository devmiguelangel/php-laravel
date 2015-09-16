<?php

namespace App\Domain;


use App\Infrastructure\PostRepository;
use Illuminate\Support\Collection;

class Imprint
{
    private $posts;

    /**
     * @param PostRepository $posts
     */
    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @return Collection
     */
    public function listPublishedPosts()
    {
        return $this->posts->posts();
    }

    public function findById($id) {
        return $this->posts->find($id);
    }
}