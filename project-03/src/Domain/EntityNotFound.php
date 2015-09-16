<?php

namespace App\Domain;


class EntityNotFound extends \OutOfBoundsException
{
    private $id;

    public function __construct($id, $message = '', $code = 0, \Exception $previous = null)
    {
        $this->id = $id;

        parent::__construct($message, $code, $previous);
    }

    public function getId()
    {
        return $this->id;
    }
}