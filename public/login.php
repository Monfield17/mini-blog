<?php
session_start();

require __DIR__ . "/../src/Database.php";
require __DIR__ . "/../src/User.php";

$db = new Database();
$conn = $db->connect();

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = new User($conn);

    // login() musí vracet pole s daty uživatele nebo false
    $loggedUser = $user->login($username, $password);

    if ($loggedUser) {
        $_SESSION["user_id"] = $loggedUser["id"];
        $_SESSION["username"] = $loggedUser["username"];

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Nesprávné jméno nebo heslo.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Přihlášení</title>

    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">

<?php if ($error): ?>
    <p class="message error"><?php echo $error; ?></p>
<?php endif; ?>

<form method="POST">
    <input type="text" name="username" placeholder="Uživatel">
    <input type="password" name="password" placeholder="Heslo">
    <button type="submit">Přihlásit</button>
</form>

</div>

</body>
</html>
