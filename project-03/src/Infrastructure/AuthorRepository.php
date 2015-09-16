<?php

namespace App\Infrastructure;


use App\Domain\Author;

class AuthorRepository extends BaseRepository
{

    /**
     * @return string
     */
    protected function table()
    {
        return 'users';
    }

    /**
     * @param array $result
     * @return mixed
     */
    protected function mapEntity(array $result)
    {
        return new Author(
            $result['email'],
            $result['password'],
            'AUTHOR'
        );
    }
}