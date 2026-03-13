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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $user_id = $_SESSION["user_id"];

    $post->create($title, $content, $user_id);
    header("Location: posts.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Nový článek</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h1>Nový článek</h1>

    <form method="POST">
        <input type="text" name="title" placeholder="Název článku">
        <textarea name="content" placeholder="Obsah článku" rows="8"></textarea>
        <button type="submit">Vytvořit</button>
    </form>

    <p><a href="posts.php">Zpět na články</a></p>
</div>

</body>
</html>
