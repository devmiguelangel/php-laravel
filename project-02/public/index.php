<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

require_once __DIR__ . '/../vendor/autoload.php';

$request = Request::capture();

$controller = new HomeController();

$controller->index($request);