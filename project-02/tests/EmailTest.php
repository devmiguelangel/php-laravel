<?php


use App\Email;

class EmailTest extends PHPUnit_Framework_TestCase
{
    public function testEmailIsValid()
    {
        $email = new Email('djmiguelarango@gmail.com');

        $this->assertInstanceOf(Email::class, $email);
    }

    public function testEmailIsInvalid()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        $email = new Email('djmiguelarango@gmail');
    }
}