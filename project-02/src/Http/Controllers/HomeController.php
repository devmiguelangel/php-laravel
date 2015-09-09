<?php

namespace App\Http\Controllers;


use App\Author;
use App\Http\Views\View;
use App\Post;
use Illuminate\Http\Request;

class HomeController
{
    public function index(Request $request)
    {
        $author = new Author('djmiguelarango@gmail.com', 'secret', 'AUTHOR');
        $author->setName('Miguel', 'MGM');

        $posts = [
            new Post($author, 'Post #1', 'This is first post'),
            new Post($author, 'Post #2', 'This is second post'),
            new Post($author, 'Post #3', 'This is third post'),
            new Post($author, 'Post #4', 'This is fourth post'),
        ];

        // var_dump($request);
        $params = [
            'message' => 'Hello from a View!',
            'posts'   => $posts,
        ];

        $view = new View('home', $params);

        $response = $view->render();

        $response->send();
    }
}