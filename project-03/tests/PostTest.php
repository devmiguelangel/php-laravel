<?php


use App\Domain\Author;
use App\Domain\Post;

class PostTest extends PHPUnit_Framework_TestCase
{
    public function testNameAuthor()
    {
        $author = new Author('djmiguelarango@gmail.com', '12345', 'AUTHOR');
        $author->setName('Miguel', 'MGM');

        $post = new Post($author, 'An title', 'An post body');

        $this->assertEquals('Miguel', $post->getAuthor());
    }
}