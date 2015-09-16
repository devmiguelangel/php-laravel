<?php

namespace App\Domain;


use App\Infrastructure\AuthorRepository;

class Post
{
    private $id;

    private $author;

    private $title;

    private $body;
    /**
     * @param @Author $author
     * @param @string $title
     * @param @string $body
     */

    public function __construct($author, $title, $body, $id = null)
    {
        $this->setAuthor($author);
        $this->title  = $title;
        $this->body   = $body;
        $this->id     = $id;
    }

    public function create(Author $author, $title, $body)
    {
        $post = new Post($author, $title, $body);

        return $post;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getAuthor()
    {
        return $this->author->getFirstName();
    }

    private function setAuthor($author)
    {
        if ($author instanceof Author) {
            $this->author = $author;
        } else {
            $repository = new AuthorRepository();
            $this->author = $repository->find($author);
        }
    }
}