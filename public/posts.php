<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

require __DIR__ . "/../src/Database.php";
require __DIR__ . "/../src/Post.php";

$db = new Database();
$conn = $db->connect();

$post = new Post($conn);
$posts = $post->getAll();
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    
<div class="container">
    <h1>Články</h1>

    <p><a href="post_create.php">+ Nový článek</a></p>

    <?php foreach ($posts as $p): ?>
        <div class="post">
            <h2><?= htmlspecialchars($p['title']) ?></h2>
            <p><?= nl2br(htmlspecialchars($p['content'])) ?></p>

            <p>
                <a href="post_edit.php?id=<?= $p['id'] ?>">Upravit</a> |
                <a href="post_delete.php?id=<?= $p['id'] ?>">Smazat</a>
            </p>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>