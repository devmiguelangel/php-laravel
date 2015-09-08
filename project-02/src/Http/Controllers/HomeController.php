<?php

namespace App\Http\Controllers;


use App\Http\Views\View;
use Illuminate\Http\Request;

class HomeController
{
    public function index(Request $request)
    {
        // var_dump($request);
        $params = [
            'message' => 'Hello from a View!',
        ];

        $view = new View('home', $params);

        $response = $view->render();

        $response->send();
    }
}