<?php include("../include/menu.php");?>


<div class="body-wrapper-inner">
    <div class="container-fluid mt-3 pb-5">

        <div class="col-lg-12 col-sm-12 mb-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="mb-0">
                    <h2 class="text-uppercase fw-bold">Ajouter une catégorie</h2>
                </div>
                <a href="category.php" class="btn btn-secondary rounded-0">
                <i class="fa-solid fa-backward me-1"></i> Retour
                </a>
            </div>
        </div>


    <div class="col-md-12 col-sm-12 mb-3">
        <?php include("process_add_category.php"); ?>
        <?php if ($error): ?>
        <div class="alert alert-danger text-center border-0 rounded-0"><?= $error ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success text-center border-0 rounded-0"><?= $success ?></div>
        <?php endif;?>
    </div>

        
        <div class="col-lg-12 col-sm-12 mb-3">
            <div class="card shadow-sm rounded-0 p-3">
                <form class="needs-validation" action="" novalidate method="post">

                     <div class="row">
                        <div class="col-lg-6 col-sm-12 mb-3">
                            <label for="" class="form-label">Nom de la catégorie <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required>
                            <div class="invalid-feedback">
                                Ce champ est requis !
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12 mb-3">
                            <label for="" class="form-label">Description <span class="text-danger">*</span></label>
                            <input type="text" name="description" class="form-control" >
                        </div>

                     </div>

                     <div class="col-12">
                        <button class="btn btn-primary rounded-0" name="save_category" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>

</div>
</div>

<script src="../vendors/js/main.js"></script>