<?php

require_once __DIR__ . '/vendor/autoload.php';

$router = new App\Core\Router();

$router->get('/posts', function() {
    $posts = new App\Models\Posts();
    $posts = $posts->getPosts();

    return ['posts' => $posts];
});

$router->get('/posts/:num', function ($id) {
    $posts = new App\Models\Posts();
    $post = $posts->getPost($id);

    return ['post' => $post];
});

$router->post('/posts/add', function () {
    $input = file_get_contents('php://input');
    $input = json_decode($input, true);

    $title = $input['title'];
    $content = $input['content'];
    $authorId = 1;
    $datePublished = time();

    $posts = new App\Models\Posts();

    return $posts->addPost($title, $content, $authorId, $datePublished);
});

$router->run();