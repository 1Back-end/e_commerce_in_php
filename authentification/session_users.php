<?php
session_start();

// Vérifier si l'utilisateur est connecté, si son UUID et son email sont présents, et si son rôle est 'admin'
if (!isset($_SESSION["uuid"]) || !isset($_SESSION["email"])) {
    header("Location: ../authentification/login.php");
    exit();
}
?>
