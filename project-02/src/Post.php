<?php

namespace App;


class Post
{
    private $author;

    private $title;

    private $body;
    /**
     * @param @Author $author
     * @param @string $title
     * @param @string $body
     */
    public function __construct(Author $author, $title, $body)
    {
        $this->author = $author;
        $this->title  = $title;
        $this->body   = $body;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getAuthor()
    {
        return $this->author->getFirstName();
    }
}