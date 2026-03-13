<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h1>Ahoj, <?= htmlspecialchars($username) ?>!</h1>
    <p>Jsi přihlášená.</p>

    <h2>Co chceš dělat?</h2>

    <ul>
        <li><a href="posts.php">📄 Zobrazit články</a></li>
        <li><a href="post_create.php">✏️ Vytvořit nový článek</a></li>
        <li><a href="logout.php">🚪 Odhlásit se</a></li>
    </ul>
</div>

</body>
</html>
