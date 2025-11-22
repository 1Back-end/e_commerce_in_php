<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


// Connexion à la base de données (MySQL)
$host = "localhost";
$user = "root";
$password = "";
$dbname = "e_commerce_in_php";

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo strtoupper(ucfirst(str_replace(".php", "", basename($_SERVER['PHP_SELF']))));?></title>
    <?php include("../components/link.php")?>
</head>
<body>


<?php include("../components/navbar.php")?>







<?php include("../components/footer.php")?>
</body>
</html>