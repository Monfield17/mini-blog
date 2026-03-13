<?php

require __DIR__ . "/../src/Database.php";

$db = new Database();
$conn = $db->connect();

echo "Oki doki";
