<?php

namespace App\Http\Controllers;


use App\Domain\Imprint;
use App\Infrastructure\FakeDatabase;
use App\Http\Views\View;
use Illuminate\Http\Request;


class HomeController
{
    private $imprint;

    public function __construct(Imprint $imprint)
    {
        $this->imprint = $imprint;
    }

    public function index(Request $request)
    {
        $posts = $this->imprint->listPublishedPosts();
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
        $post = $this->imprint->findById($id);

        $view = new View('post', [
            'post' => $post
        ]);

        return $view->render();
    }

}