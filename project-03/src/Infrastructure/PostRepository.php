<?php

namespace App\Infrastructure;


use App\Domain\Post;
use Illuminate\Support\Collection;

class PostRepository
{
    public function getPDO()
    {
        return new \PDO('mysql:dbname=test_php;host=127.0.0.1', 'homestead', 'secret');
    }

    public function posts()
    {
        $pdo = $this->getPDO();

        $sql = 'SELECT * FROM posts;';

        $sth = $pdo->prepare($sql);
        $sth->execute();

        $results = $this->mapToPosts($sth->fetchAll());

        return $results;
    }

    public function find($id)
    {
        $pdo = $this->getPDO();

        $sql = 'SELECT * FROM posts WHERE id = :id ;';

        $sth = $pdo->prepare($sql);
        $sth->bindParam(':id', $id, \PDO::PARAM_INT);

        $sth->execute();
        
        $result = $sth->fetch();

        if ($result === false) {
            throw new \OutOfBoundsException('Post does not exist!');
        }

        return $this->mapPost($result);
    }

    public function search($text)
    {
        $pdo = $this->getPDO();

        $sql = 'SELECT * FROM posts WHERE title LIKE :text OR body LIKE :text;';

        $sth = $pdo->prepare($sql);

        $text = '%' . $text . '%';
        $sth->bindParam(':text', $text, \PDO::PARAM_STR);

        $sth->execute();

        return $this->mapToPosts($sth->fetchAll());
    }

    private function mapToPosts(array $results)
    {
        $posts = new Collection();

        foreach ($results as $result) {
            $post = $this->mapPost($result);

            $posts->push($post);
        }

        return $posts;
    }

    private function mapPost($result)
    {
        return new Post(
            $result['author_id'],
            $result['title'],
            $result['body'],
            $result['id']
        );
    }
}