<?php

//načtení souboru
require  __DIR__ . "/../src/Database.php";
require __DIR__ . "/../src/User.php";

//vytvoření objektu
$db = new Database();
//volání metody
$conn = $db->connect();

//zjistení zda byl formuláš odeslán

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$username = $_POST["username"];
$password = $_POST["password"];

//vytvořit objekt user
$user = new User($conn);
//zavolat registr
$user->register($username, $password);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <form method="POST">
    <input type="text" name="username">
    <input type="password" name="password">
    <button type="submit">Registrovat</button>
</form>
    
</body>
</html>