<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hello from a View!</title>
</head>
<body>
    <h1><?= $message ;?></h1>

    <ul>
        <?php /** @type App\Post $post */
        foreach($posts as $post): ?>
            <li>
                <h2><?= $post->getTitle() ;?> by <small><?= $post->getAuthor() ;?></small></h2>
                <p>
                    <?= $post->getBody() ;?>
                </p>
            </li>
        <?php endforeach ?>
    </ul>
</body>
</html>