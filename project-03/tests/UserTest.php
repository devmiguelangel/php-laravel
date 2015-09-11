<?php


use App\Domain\User;

class UserTest extends PHPUnit_Framework_TestCase
{
    public function testCreateUser()
    {
        // $user = null;
        $user = new User('djmiguelarango@gmail.com', '12345');

        $this->assertInstanceOf(User::class, $user);
    }

    /**
     * @test
     */
    public function haveFirstName()
    {
        $user = new User('djmiguelarango@gmail.com', '12345');
        $user->setName('Miguel', 'MGM');

        $first_name = $user->getFirstName();

        $this->assertEquals('Miguel', $first_name);
    }


}