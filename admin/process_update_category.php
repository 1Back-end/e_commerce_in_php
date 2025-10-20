<?php
include("../database/connexion.php");
include("../fonctions/fonction.php");


$error = "";
$success = "";


if(isset($_POST["update_category"])){
    $uuid = $_POST["uuid"] ?? null;
    $name  = $_POST["name"] ?? null;
    $description = $_POST["description"] ?? null;
    $update_by = $_SESSION["uuid"] ?? null;
   


    // Verifications de l'uncité des données

    $exists_info = $connexion->prepare("SELECT COUNT(*) 
            FROM tlbl_category_product 
            WHERE is_deleted = 1 
            AND name = :name");

    $exists_info->execute([
        ":name" => $name
    ]);
    if($exists_info->fetchColumn() > 0){
        $error = "Cette catégorie existe deja.";
    }else {
        $update_info = $connexion->prepare(query: "UPDATE tlbl_category_product SET name = :name, description = :description, update_by = :update_by WHERE uuid = :uuid");
        $update_info->execute([
        ':uuid'          => $uuid,
        ':name'          => $name,
        ':description'   => $description,
        ':update_by'     => $update_by
        
        ]);


        if ($update_info) {
            $success ="Catégorie modifiée avec succès";
            
        }else {
            $error = "Erreur lors de la modification de la catégorie !";
        }

        
    }

}



?>