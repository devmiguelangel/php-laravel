<?php

namespace App\Domain;


class User
{
    /**
     * @var string
     */
    protected $email;
    /**
     * @var string
     */
    protected $password;
    /**
     * @var string
     */
    protected $firstName;
    /**
     * @var string
     */
    protected $lastName;

    /**
     * @param string $email
     * @param string $password
     */
    public function __construct($email, $password)
    {
        $this->email    = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @param string $firstName
     * @param string $lastName
     */
    public function setName($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
}