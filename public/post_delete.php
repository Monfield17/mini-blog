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

// 2) Smazání článku
$post->delete($id);

// 3) Přesměrování zpět
header("Location: posts.php");
exit;
