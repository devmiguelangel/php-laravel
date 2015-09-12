<?php


use App\Infrastructure\PostRepository;
use Illuminate\Support\Collection;

class PostRepositoryTest extends PHPUnit_Framework_TestCase
{
    public function testGetAllPosts()
    {
        $db = new PostRepository();

        $results = $db->posts();

        // var_dump($results);

        $this->assertInstanceOf(Collection::class, $results);

        foreach ($results as $post) {
            $this->assertInstanceOf(\App\Domain\Post::class, $post);
        }
    }

    public function testFindAPost()
    {
        $db = new PostRepository();

        $post = $db->find(2);

        $this->assertInstanceOf(\App\Domain\Post::class, $post);
    }

    public function testNotFindAPost()
    {
        $db = new PostRepository();

        $this->setExpectedException(\OutOfBoundsException::class);
        $post = $db->find(2333);
    }

    public function testSearchATextInPost()
    {
        $db = new PostRepository();

        $posts = $db->search('#4');
        var_dump($posts);

        $this->assertInstanceOf(Collection::class, $posts);
    }

}