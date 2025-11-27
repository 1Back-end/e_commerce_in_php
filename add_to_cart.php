<?php
session_start();

if (!isset($_GET['uuid'])) {
    header("Location: product.php");
    exit;
}

$uuid = $_GET['uuid'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (!isset($_SESSION['cart'][$uuid])) {
    $_SESSION['cart'][$uuid] = 1;
} else {
    $_SESSION['cart'][$uuid]++;
}

header("Location: product.php");
exit;
