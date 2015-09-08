<?php


class PostTest extends PHPUnit_Framework_TestCase
{
    public function testNameAuthor()
    {
        $author = new \App\Author('djmiguelarango@gmail.com', '12345', 'AUTHOR');
        $author->setName('Miguel', 'MGM');

        $post = new \App\Post($author, 'An title', 'An post body');

        $this->assertEquals('Miguel', $post->getAuthor());
    }
}