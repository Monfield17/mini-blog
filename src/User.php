<?php

class User {
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function register($username, $password) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed);
        $stmt->execute();

        return $stmt->affected_rows > 0;
    }

    public function login($username, $password) {

        // Připravíme dotaz
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        // Výsledek
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Ověření hesla
        if ($user && password_verify($password, $user["password"])) {
            return $user; // vrací celý řádek uživatele
        }

        return false;
    }
}
