<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class HomeController
{
    public function index(Request $request)
    {
        // var_dump($request);
        return 'Hellow ' . $request->getRequestUri() . ' at HomeController';
    }
}