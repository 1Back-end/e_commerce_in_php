<?php
include("../database/connexion.php");

if (isset($_GET["uuid"])) {
    $uuid = $_GET["uuid"];
    $query = "UPDATE tlbl_category_product SET is_active = 1 WHERE uuid = :uuid";
    $execute_request = $connexion->prepare( $query);
    $execute_request->bindParam(":uuid",$uuid);
    $execute_request->execute();

    if ($execute_request->rowCount() > 0) {
        header("Location: category.php?message=Categorie activée avec succes");
    }else{
    header("Location: category.php?message=une erreur est survenue");
    }

}else{
    header("Location: category.php?message=uuid de la categorie introuvable");
    exit;
}

?>