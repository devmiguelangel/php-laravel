<?php


use App\Domain\Author;

class AuthorTest extends PHPUnit_Framework_TestCase
{
    public function testCreateAuthor()
    {
        $author = new Author('djmiguelarango@gmail.com', '12345', 'AUTHOR');

        $this->assertInstanceOf(Author::class, $author);
    }

    public function testCreateAuthorKey()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        $author = new Author('djmiguelarango@gmail.com', '12345', 'MIGUEL');
    }
}