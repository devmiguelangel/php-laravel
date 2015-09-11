<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Post</title>
</head>
<body>
    <h1>
        <?php /** @var \App\Post $post */ ?>
        <?= $post->getTitle() ;?>
        <small><?= $post->getAuthor() ;?></small>
    </h1>
    <p><?= $post->getBody() ;?></p>
</body>
</html>