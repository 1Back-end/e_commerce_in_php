<?php include("../include/menu.php"); ?>
<?php include("../fonctions/fonction.php"); ?>
<?php 
$category_products = get_active_category_products($connexion);
?>

<div class="body-wrapper-inner">
    <div class="container-fluid mt-3 pb-5">

        <div class="col-lg-12 col-sm-12 mb-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="mb-0">
                    <h2 class="text-uppercase fw-bold">Ajouter un produit</h2>
                </div>
                <a href="product.php" class="btn btn-secondary rounded-0">
                    <i class="fa-solid fa-backward me-1"></i> Retour
                </a>
            </div>
        </div>

      <div class="col-md-12 col-sm-12 mb-3">
        <?php include("process_add_product.php"); ?>
        <?php if ($error): ?>
        <div class="alert alert-danger text-center border-0 rounded-0"><?= $error ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success text-center border-0 rounded-0"><?= $success ?></div>
        <?php endif;?>
    </div>
            
        <div class="col-lg-12 col-sm-12 mb-3">
            <div class="card shadow-sm rounded-0 p-3">
                <form class="needs-validation" action="" novalidate method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-lg-4 col-sm-12 mb-3">
                            <label class="form-label">Nom du produit <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required>
                            <div class="invalid-feedback">Ce champ est requis !</div>
                        </div>

                        <div class="col-lg-4 col-sm-12 mb-3">
                            <label class="form-label">Prix (FCFA) <span class="text-danger">*</span></label>
                            <input type="number" name="price" min="0" class="form-control" step="0.01" required>
                            <div class="invalid-feedback">Ce champ est requis !</div>
                        </div>

                        <div class="col-lg-4 col-sm-12 mb-3">
                    <label for="">Categorie produits <span class="text-danger">*</span></label>
                    <select name="category_product_uuid" class="form-select" id="" required>
                        <option value="" disabled selected>--choisir une option--</option>
                        <?php foreach($category_products as $category_product): ?>
                            <option value="<?= $category_product["uuid"]  ?>">
                                <?= $category_product["name"] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                   </div> 
                   
                    <div class="col-lg-4 col-sm-12 mb-3">
                    <label class="form-label">Stock seuil <span class="text-danger">*</span></label>
                    <input type="number" min="0" name="stock_seuil" class="form-control" required>
                    <div class="invalid-feedback">
                        ce champ est requis
                    </div>
                </div>
                
                        <div class="col-lg-4 col-sm-12 mb-3">
                            <label class="form-label">Quantité en stock <span class="text-danger">*</span></label>
                            <input type="number" name="qte" class="form-control" required>
                            <div class="invalid-feedback">Ce champ est requis !</div>
                        </div>


                        <div class="col-lg-4 col-sm-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" ></textarea>
                        </div>

                        <div class="col-lg-4 col-sm-12 mb-3">
                            <label class="form-label">Image du produit</label>
                            <input type="file" name="image_file" class="form-control">
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary rounded-0" name="save_product" type="submit">Enregistrer</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<script src="../vendors/js/main.js"></script>
