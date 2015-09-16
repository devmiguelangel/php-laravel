<?php

namespace App\Infrastructure;


use App\Domain\Post;
use Illuminate\Support\Collection;

class PostRepository extends BaseRepository
{
    public function posts()
    {
        $pdo = $this->getPDO();

        $sql = 'SELECT * FROM posts;';

        $sth = $pdo->prepare($sql);
        $sth->execute();

        $results = $this->mapToPosts($sth->fetchAll());

        return $results;
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
            $post = $this->mapEntity($result);

            $posts->push($post);
        }

        return $posts;
    }

    /**
     * @return string
     */
    protected function table()
    {
        return 'posts';
    }

    /**
     * @param array $result
     * @return mixed
     */
    protected function mapEntity(array $result)
    {
        return new Post(
            $result['author_id'],
            $result['title'],
            $result['body'],
            $result['id']
        );
    }
}