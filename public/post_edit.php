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

// 1) Kontrola ID
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: posts.php");
    exit;
}

$id = (int)$_GET["id"];

// 2) Načtení článku
$article = $post->getById($id);

// 3) Pokud článek neexistuje → zpět
if (!$article) {
    header("Location: posts.php");
    exit;
}

// 4) Uložení změn
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];

    $post->update($id, $title, $content);
    header("Location: posts.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Upravit článek</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h1>Upravit článek</h1>

    <form method="POST">
        <input type="text" name="title" value="<?= htmlspecialchars($article['title']) ?>">
        <textarea name="content" rows="8"><?= htmlspecialchars($article['content']) ?></textarea>
        <button type="submit">Uložit</button>
    </form>

    <p><a href="posts.php">Zpět na články</a></p>
</div>

</body>
</html>
