<?php

namespace App\Infrastructure;


use App\Domain\Post;
use Illuminate\Support\Collection;

class Database
{
    public function posts()
    {
        $pdo = new \PDO('mysql:dbname=test_php;host=127.0.0.1', 'homestead', 'secret');

        $sql = 'SELECT * FROM posts;';

        $sth = $pdo->prepare($sql);
        $sth->execute();

        $results = $this->mapToPosts($sth->fetchAll());

        return $results;
    }

    private function mapToPosts(array $results)
    {
        $posts = new Collection();

        foreach ($results as $result) {
            $post = new Post(
                $result['author_id'],
                $result['title'],
                $result['body'],
                $result['id']
            );

            $posts->push($post);
        }

        return $posts;
    }
}