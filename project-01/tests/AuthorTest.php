<?php


class AuthorTest extends PHPUnit_Framework_TestCase
{
    public function testCreateAuthor()
    {
        $author = new \App\Author('djmiguelarango@gmail.com', '12345', 'AUTHOR');

        $this->assertInstanceOf(\App\Author::class, $author);
    }

    public function testCreateAuthorKey()
    {
        $this->setExpectedException(InvalidArgumentException::class);

        $author = new \App\Author('djmiguelarango@gmail.com', '12345', 'MIGUEL');
    }
}