<?php
session_start();

if (!isset($_SESSION["test"])) {
    $_SESSION["test"] = "SESSION OK";
    echo "První načtení — session nastavena.";
} else {
    echo "Session funguje: " . $_SESSION["test"];
}