<?php include("../include/menu.php");?>



<?php 
include("../database/connexion.php");
if (isset ($_GET["uuid"])) {
    $uuid = $_GET["uuid"];
    $query = "SELECT * FROM tlbl_users WHERE uuid = :uuid";
    $execute_request = $connexion->prepare($query);
    $execute_request->bindParam(":uuid", $uuid);
    $execute_request->execute();
    $user = $execute_request->fetch(PDO::FETCH_ASSOC);

}else{
    header("Location: users.php?message=uuid de l'utilisateur introuvable");
    exit;
}


?>


<div class="body-wrapper-inner">
    <div class="container-fluid mt-3 pb-5">

        <div class="col-lg-12 col-sm-12 mb-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="mb-0">
                    <h2 class="text-uppercase fw-bold">Modifier un utilisateur</h2>
                </div>
                <a href="users.php" class="btn btn-secondary rounded-0">
                <i class="fa-solid fa-backward me-1"></i> Retour
                </a>
            </div>
        </div>



        <div class="col-md-12 col-sm-12 mb-3">
    <?php include("process_update_users.php"); ?>
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
                        <div class="col-lg-4 col-sm-12 mb-3">
                            <label for="" class="form-label">Nom <span class="text-danger">*</span></label>
                            <input type="text" value="<?= $user["first_name"]?>" name="first_name" class="form-control" required>
                            <input type="hidden" value="<?= $user["uuid"]?>" name="uuid" class="form-control" required>
                            <div class="invalid-feedback">
                                Ce champ est requis !
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 mb-3">
                            <label for="" class="form-label">Prenom <span class="text-danger">*</span></label>
                            <input type="text" value="<?= $user["last_name"]?>" name="last_name" class="form-control" required>
                            <div class="invalid-feedback">
                                Ce champ est requis !
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 mb-3">
                            <label for="" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" value="<?= $user["email"]?>"name="email" class="form-control" required>
                            <div class="invalid-feedback">
                                Ce champ est requis !
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 mb-3">
                            <label for="" class="form-label">Numéro de téléphone <span class="text-danger">*</span></label>
                            <input type="tel"  value="<?= $user["phone_number"]?>" name="phone_number" class="form-control" required>
                            <div class="invalid-feedback">
                                Ce champ est requis !
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 mb-3">
                            <label for="" class="form-label">Second numéro <span class="text-danger">*</span></label>
                            <input type="tel" value="<?= $user["phone_number_2"]?>" name="phone_number_2" class="form-control" >
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 mb-3">
                            <label for="" class="form-label">Address<span class="text-danger">*</span></label>
                            <input type="text" value="<?= $user["address"]?>" name="address" class="form-control" required>
                            <div class="invalid-feedback">
                                Ce champ est requis !
                            </div>
                        </div>


                     </div>

                     <div class="col-12">
                        <button class="btn btn-primary rounded-0" name="update_users" type="submit">Modifier</button>
                    </div>
                </form>
            </div>
        </div>




    </div>
</div>


<script src="../vendors/js/main.js"></script>