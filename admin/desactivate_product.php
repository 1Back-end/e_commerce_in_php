<?php 
include("../database/connexion.php");

if (isset($_GET["uuid"])) {
    $uuid = $_GET["uuid"];
    $query = "UPDATE tlbl_products SET is_active = 0 WHERE uuid = :uuid";
    $execute_request = $connexion->prepare( $query);
    $execute_request->bindParam(":uuid",$uuid);
    $execute_request->execute();

    if ($execute_request->rowCount() > 0) {
        header("Location:product.php?message=Produit desactivé avec succes");
    }else{
    header("Location: product.php?message=une erreur est survenue");
    }

}else{
    header("Location:product.php?message=uuid du produit introuvable");
    exit;
}

?>