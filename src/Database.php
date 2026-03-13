<?php
class Database {

private $host;
private $user;
private $password;
private $dbname;

public function __construct() {
    require __DIR__ . "/../config/config.php";

    $this->host = $host;
    $this->user = $user;
    $this->password = $password;
    $this->dbname = $dbname;

}

public function connect() {
    $conn = new mysqli (
    $this->host,
    $this->user,
    $this->password,
    $this->dbname
    );

    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

}