<?php


use App\Infrastructure\Database;

class DatabaseTest extends PHPUnit_Framework_TestCase
{
    public function testConnection()
    {
        $db = new Database();

        $results = $db->posts();

        // var_dump($results);

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $results);

        foreach ($results as $post) {
            $this->assertInstanceOf(\App\Domain\Post::class, $post);
        }
    }
}