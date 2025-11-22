<?php

if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$totalArticles = array_sum($_SESSION['cart']);
?>


<!-- EN-TÊTE -->
<header>
    <!-- EN-TÊTE SUPÉRIEUR -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +237 690 00 00 00</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> contact@technova.cm</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> Kribi, Cameroun</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-money"></i> FCFA</a></li>
                <li><a href="../authentification/login.php"><i class="fa fa-user-o"></i> Mon compte</a></li>
            </ul>
        </div>
    </div>
    <!-- /EN-TÊTE SUPÉRIEUR -->

    <!-- EN-TÊTE PRINCIPAL -->
    <div id="header">
        <div class="container">
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="../pages/home.php" class="logo">
                            <img src="../assets/img/logo.png" alt="Logo TechNova">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- BARRE DE RECHERCHE -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">Toutes les catégories</option>
                                <option value="1">Ordinateurs</option>
                                <option value="2">Téléphones</option>
                                <option value="3">Accessoires</option>
                            </select>
                            <input class="input" placeholder="Rechercher un produit...">
                            <button class="search-btn">Rechercher</button>
                        </form>
                    </div>
                </div>
                <!-- /BARRE DE RECHERCHE -->

                <!-- COMPTE -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Liste de souhaits -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Ma liste</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Liste de souhaits -->

                        <!-- Panier -->
                        <div class="dropdown">
                            <a href="../pages/cart.php" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <!-- <?php session_start(); ?> -->
                                <i class="fa fa-shopping-cart"></i>
                                <span>Mon panier</span>
                                <div class="qty"><?= isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0 ?></div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="../assets/img/product01.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                            <h4 class="product-price"><span class="qty">1x</span> 980 FCFA</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>

                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="../assets/img/product02.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                            <h4 class="product-price"><span class="qty">3x</span> 980 FCFA</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                </div>
                                <div class="cart-summary">
                                    <small>3 article(s) sélectionné(s)</small>
                                    <h5>Total : 2 940 FCFA</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="#">Voir le panier</a>
                                    <a href="#">Commander <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Panier -->

                        <!-- Menu mobile -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu mobile -->
                    </div>
                </div>
                <!-- /COMPTE -->
            </div>
        </div>
    </div>
    <!-- /EN-TÊTE PRINCIPAL -->
</header>
<!-- /EN-TÊTE -->

<!-- NAVIGATION -->
<nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="../pages/home.php">Accueil</a></li>
                <li><a href="../pages/about.php">À propos</a></li>
                <li><a href="../pages/product.php">Produits</a></li>
                <li><a href="../pages/categories.php">Catégories</a></li>
                <li><a href="../pages/contact.php">Contacts</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- /NAVIGATION -->
