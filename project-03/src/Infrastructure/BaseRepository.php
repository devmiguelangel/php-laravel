<?php

namespace App\Infrastructure;


use App\Domain\EntityNotFound;

abstract class BaseRepository
{

    protected static $pdo;

    /**
     * @return string
     */
    abstract protected function table();

    /**
     * @param array $result
     * @return mixed
     */
    abstract protected function mapEntity(array $result);

    /**
     * @return \PDO
     */
    protected function getPDO()
    {
        if (! self::$pdo) {
            self::$pdo = new \PDO('mysql:dbname=test_php;host=127.0.0.1', 'homestead', 'secret');
        }

        return self::$pdo;
    }

    public function find($id)
    {
        $pdo = $this->getPDO();

        $sql = 'SELECT * FROM ' . $this->table() . ' WHERE id = :id ;';

        $sth = $pdo->prepare($sql);
        $sth->bindParam(':id', $id, \PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetch();

        if ($result === false) {
            // throw new \OutOfBoundsException('Post does not exist!');
            throw new EntityNotFound($id, strtoupper($this->table()) . $id . ' does not exist!');
        }

        return $this->mapEntity($result);
    }
}