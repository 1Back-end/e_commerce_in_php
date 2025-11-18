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

<?php include("../components/section.php")?>



<?php
require_once('../fonctions/fonction.php');

$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$pagination = get_all_products($connexion, $page);

$products = $pagination['data'];
$totalPages = $pagination['total_pages'];
$currentPage = $pagination['current_page'];
?>

<div class="container p-3 mt-3">
    <div class="col-lg-12 col-sm-12">
        <h2 class="fw-bold text-uppercase text-center">Liste de nos produits</h2>
    </div>

    <div class="col-lg-12 col-sm-12 mb-3 mt-5">
        <?php if (!empty($products)): ?>
            <div class="row gx-3 gy-3">
                <?php foreach ($products as $product): ?>
                    <div class="col-lg-4 col-sm-12 mb-4">
                        <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
                            <div class="product-widget">
                                <div class="product-img">
                                    <?php if (!empty($product['image_file'])): ?>
                                        <img src="../uploads/<?= htmlspecialchars($product['image_file']) ?>"  alt="Image du produit">
                                    <?php else: ?>
                                        <img src="../uploads/default.jpg" alt="Image par défaut">
                                    <?php endif; ?>
                                </div>
                                <div class="product-body p-3 text-center">
                                    <p class="product-category text-muted mb-1"><?= htmlspecialchars($product['category_product']) ?></p>
                                    <h5 class="product-name mb-2 fw-semibold"><?= htmlspecialchars($product['name']) ?></h5>
                                    <h4 class="product-price text-danger">
                                        <?= htmlspecialchars($product['price']) ?> 
                                    </h4>
                                  <button type="button" class="btn btn-info">Commander</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-danger text-center mt-4" role="alert">
                Aucun produit trouvé.
            </div>
        <?php endif; ?>
    </div>
</div>



</body>
</html>