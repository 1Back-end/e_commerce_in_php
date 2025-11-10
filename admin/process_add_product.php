<?php
include("../database/connexion.php");
include("../fonctions/fonction.php");

$error = "";
$success = "";

if (isset($_POST["save_product"])) {
    $uuid = generate_uuid_v4();
    $name = trim($_POST["name"] ?? '');
    $description = trim($_POST["description"] ?? '');
    $code = $_POST["code"] ?? null;
    $price = $_POST["price"] ?? null;
    $category_product_uuid = $_POST["category_product_uuid"] ?? null;
    $added_by = $_SESSION["uuid"] ?? null;
    $qte = $_POST["qte"] ?? null;
    $image = $_FILES["image"] ?? null;


    $exist_info = $connexion->prepare("SELECT COUNT(*) FROM tlbl_products WHERE is_deleted = 1 AND name = :name AND code = :code");
    $exist_info->execute([
        "name" => $name,
        "code" => $code,
    ]);

    if ($exist_info->fetchColumn() > 0) {
        $error = "Ce produit existe déjà";
    } else {
        // Gestion du fichier image
        if ($image && $image["error"] === 0) {
            $image_name = uniqid() . "_" . basename($image["name"]);
            move_uploaded_file($image["tmp_name"], "../uploads/" . $image_name);
        } else {
            $image_name = null;
        }

     
        $insert_info = $connexion->prepare("
            INSERT INTO tlbl_products (uuid, name, description, code, price, category_product_uuid, added_by, qte, image)
            VALUES (:uuid, :name, :description, :code, :price, :category_product_uuid, :added_by, :qte, :image)
        ");

        $insert_done = $insert_info->execute([
            "uuid" => $uuid,
            "name" => $name,
            "description" => $description,
            "code" => $code,
            "price" => $price,
            "category_product_uuid" => $category_product_uuid,
            "added_by" => $added_by,
            "qte" => $qte,
            "image" => $image_name,
        ]);

        if ($insert_done) {
            $success = "Produit enregistré avec succès";
            echo "<script>setTimeout(function() { window.location.href='product.php'; }, 3000);</script>";
        } else {
            $error = "Erreur lors de l’enregistrement.";
        }
    }
}
?>
