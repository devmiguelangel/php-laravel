<?php

namespace App\Infrastructure;


use App\Domain\Author;
use App\Domain\Post;
use Illuminate\Support\Collection;

class FakeDatabase
{

    /**
     * @return Collection
     */
    public function posts()
    {
        $author = new Author('djmiguelarango@gmail.com', 'secret', 'AUTHOR');
        $author->setName('Miguel', 'MGM');

        return new Collection([
            1 => new Post($author, 'Post #1', 'This is first post'),
            2 => new Post($author, 'Post #2', 'This is second post'),
            3 => new Post($author, 'Post #3', 'This is third post'),
            4 => new Post($author, 'Post #4', 'This is fourth post'),
            5 => new Post($author, 'Post #5', 'This is fifth post'),
        ]);

    }
}