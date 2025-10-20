<?php
include("../database/connexion.php");
include("../fonctions/fonction.php");

$error = "";
$success = "";

if (isset($_POST["save_category"])) {
    $uuid = generate_uuid_v4();
    $name = trim($_POST["name"] ?? '');
    $description = trim($_POST["description"] ?? '');
    $added_by = $_SESSION["uuid"] ?? null;

    if (empty($name)){
        $error = "Veuillez remplir tous les champs obligatoires.";
    }else {
        $exist_info = $connexion->prepare("
            SELECT COUNT(*) 
            FROM tlbl_category_product 
            WHERE is_deleted = 1 
            AND name = :name
        ");
        $exist_info->execute([
            ":name" => $name
        ]);

        if ($exist_info->fetchColumn() > 0) {
            $error = "Cette catégorie existe deja.";
        } else {
            $insert_info = $connexion->prepare("
                INSERT INTO tlbl_category_product 
                (uuid, name, description, added_by) 
                VALUES 
                (:uuid, :name, :description, :added_by)
            ");
            $executed = $insert_info->execute([
                ":uuid" => $uuid,
                ":name" => $name,
                ":description" => $description,
                ":added_by" => $added_by
            ]);
            if ($executed) {
                $success = "Catégorie ajouté avec succès.";
            } else {
                $error = "Une erreur est survenue lors de l'ajout.";
            }
        }
    }


}

?>