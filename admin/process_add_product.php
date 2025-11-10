<?php
include("../database/connexion.php");

$error = "";
$success = "";

if (isset($_POST["save_product"])) {
    $uuid = generate_uuid_v4();
    $name = trim($_POST["name"] ?? '');
    $description = trim($_POST["description"] ?? '');
    $code = generateProductsCode();
    $price = $_POST["price"] ?? null;
    $category_product_uuid = $_POST["category_product_uuid"] ?? null;
    $qte = $_POST["qte"] ?? null;
    $stock_seuil = $_POST["stock_seuil"] ?? null;
    $added_by = $_SESSION["uuid"] ?? null;
    $image_file = $_FILES["image_file"] ?? null;

    // Vérification du nom du produit existant (produit non supprimé)
    $exist_info = $connexion->prepare("
        SELECT COUNT(*) FROM tlbl_products 
        WHERE is_deleted = 0 AND name = :name
    ");
    $exist_info->execute(["name" => $name]);

    if ($exist_info->fetchColumn() > 0) {
        $error = "Ce produit existe déjà.";
    } else {
        // Gestion du fichier image
        $image_name = "default.jpg"; // Valeur par défaut

        if ($image_file && $image_file['error'] === UPLOAD_ERR_OK) {
            $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];
            $image_ext = strtolower(pathinfo($image_file['name'], PATHINFO_EXTENSION));

            if (in_array($image_ext, $valid_extensions)) {
                $image_name = uniqid('img_', true) . '.' . $image_ext;
                $upload_dir = "../uploads/";
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                move_uploaded_file($image_file['tmp_name'], $upload_dir . $image_name);
            } else {
                $error = "L'image doit être au format jpg, jpeg, png ou gif.";
            }
        }

        // Insertion du produit si aucune erreur
        if (empty($error)) {
            $insert_info = $connexion->prepare("
                INSERT INTO tlbl_products 
                (uuid, name, description, code, price, category_product_uuid, added_by, qte, image_file, stock_seuil)
                VALUES 
                (:uuid, :name, :description, :code, :price, :category_product_uuid, :added_by, :qte, :image_file, :stock_seuil)
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
                "image_file" => $image_name,
                "stock_seuil" => $stock_seuil
            ]);

            if ($insert_done) {
                $success = "Produit enregistré avec succès.";
                echo "<script>setTimeout(function() { window.location.href='product.php'; }, 3000);</script>";
            } else {
                $error = "Erreur lors de l’enregistrement du produit.";
            }
        }
    }
    }
?>
