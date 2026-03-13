<?php

class Post {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // CREATE
    public function create($title, $content, $user_id) {
        $stmt = $this->conn->prepare("INSERT INTO posts (title, content, user_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $title, $content, $user_id);
        return $stmt->execute();
    }

    // READ ALL
    public function getAll() {
        $result = $this->conn->query("SELECT * FROM posts ORDER BY created_at DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // READ ONE
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // UPDATE
    public function update($id, $title, $content) {
        $stmt = $this->conn->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
        $stmt->bind_param("ssi", $title, $content, $id);
        return $stmt->execute();
    }

    // DELETE
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM posts WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
