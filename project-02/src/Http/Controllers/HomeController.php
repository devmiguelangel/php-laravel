<?php

namespace App\Http\Controllers;


use App\FakeDatabase;
use App\Http\Views\View;
use Illuminate\Http\Request;


class HomeController
{
    private $db;

    public function __construct(FakeDatabase $database)
    {
        $this->db = $database;
    }

    public function index(Request $request)
    {
        $posts = $this->db->posts();
        $first = $posts->first();

        // var_dump($request);
        $params = [
            'message' => 'Hello from a View!',
            'posts'   => $posts,
            'first'   => $first,
        ];

        // $view = new View('home', $params);
        $view = new View('home', $params);
        return $view->render();
        // $response = $view->render();
        // $response->send();
    }

    public function show($id)
    {
        $posts = $this->db->posts();

        $view = new View('post', [
            'post' => $posts->get($id)
        ]);

        return $view->render();
    }
}