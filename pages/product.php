<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
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
<?php include("../components/navbar.php") ?>
<?php include("../components/section.php") ?>

<?php
require_once('../fonctions/fonction.php');

$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$pagination = get_all_products($connexion, $page);

$products = $pagination['data'];
$totalPages = $pagination['total_pages'];
$currentPage = $pagination['current_page'];
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Liste de nos produits</h2>

    <div class="row g-4">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="col-lg-3 col-sm-12 d-flex text-center mb-3 justify-content-center">
                    
                    <div class="card shadow-lg border-0 rounded-3" style="width: 18rem;">
                        <?php if (!empty($product['image_file'])): ?>
                            <img src="../uploads/<?= htmlspecialchars($product['image_file']) ?>" style="height: 200px;width: 200px" class="img-fluid" alt="Image du produit">
                        <?php else: ?>
                            <img src="../uploads/default.jpg" class="img-fluid" alt="Image par défaut">
                        <?php endif; ?>

                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($product['category_product']) ?></p>
                            <p class="fw-bold"><?= htmlspecialchars($product['price']) ?> FCFA</p>
                            <a href="#" class="btn btn-primary">Commander</a>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-danger">Aucun produit trouvé.</p>
        <?php endif; ?>
    </div>
</div>


<br><br>




<?php include("../components/footer.php")?>
</body>
</html>