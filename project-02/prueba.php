<?php

require_once 'vendor/autoload.php';

$user = new \App\Author('djmiguelarango@gmail.com', '12345');

$user->setName('Miguel', 'Mamani');

echo $user->getLastName();
echo PHP_EOL;

//var_dump($user);