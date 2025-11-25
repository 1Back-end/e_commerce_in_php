<?php
session_start();


if (isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = []; // Vide le panier
    $_SESSION['message'] = "Le panier a été vidé.";
    header("Location: cart.php"); // Redirige pour éviter le rechargement du formulaire
    exit();
}
// Récupération du message
$message = $_SESSION['message'] ?? null;
unset($_SESSION['message']); // Effacer le message après affichage

// Nombre total d'articles
$totalArticles = isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon panier</title>
    <?php include("../components/link.php"); ?>
    <style>
        .cart-message {
            margin-top: 30px;
        }

        .cart-message .alert {
            font-size: 1.1rem;
        }

        .cart-summary {
            margin-top: 20px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .cart-summary h4 {
            margin-bottom: 10px;
        }

        .btn-back {
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <?php include("../components/navbar.php"); ?>

    <div class="container cart-message">
        <h2 class="text-center mb-4">Mon panier</h2>

        <?php if ($message): ?>
            <div class="alert alert-success text-center">
                <i class="fa fa-check-circle"></i> <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <div class="cart-summary text-center">
            <?php if ($totalArticles > 0): ?>
                <h4>Total d'articles : <span class="badge bg-primary"><?= $totalArticles ?></span></h4>
                <p>Vous pouvez continuer vos achats ou passer à la commande.</p>
                <a href="product.php" class="btn btn-success btn-back">Continuer vos achats</a>
                <a href="checkout.php" class="btn btn-success btn-back">Passer à la commande</a>
                <form method="post">
        <button class="btn btn-primary btn-back " type="submit" name="clear_cart">Vider le panier</button>
         </form>
            <?php else: ?>
                <h4 class="text-danger">Votre panier est vide</h4>
                <a href="product.php" class="btn btn-primary btn-back">Voir les produits</a>
            <?php endif; ?>
        </div>
    </div>
        


<br><br>
    <?php include("../components/footer.php")?>
</body>

</html>