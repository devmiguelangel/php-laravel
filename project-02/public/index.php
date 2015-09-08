<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

require_once __DIR__ . '/../vendor/autoload.php';

$request = Request::capture();

$home = new HomeController();

echo $home->index($request);