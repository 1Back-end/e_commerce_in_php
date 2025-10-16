<?php
include("../database/connexion.php");
include("../fonctions/fonction.php");


$error = "";
$success = "";

if (isset($_POST["save_users"])) {
    // Récupération sécurisée des données
    $uuid = generate_uuid_v4();
    $first_name = trim($_POST["first_name"] ?? '');
    $last_name = trim($_POST["last_name"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $phone_number = trim($_POST["phone_number"] ?? '');
    $phone_number_2 = trim($_POST["phone_number_2"] ?? '');
    $address = trim($_POST["address"] ?? '');

    // Vérification des champs obligatoires
    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone_number)) {
        $error = "Veuillez remplir tous les champs obligatoires.";
    } else {
        // Vérification d'existence de l'utilisateur
        $exist_info = $connexion->prepare("
            SELECT COUNT(*) 
            FROM tlbl_users 
            WHERE is_deleted = 0 
            AND (email = :email OR phone_number = :phone_number OR phone_number_2 = :phone_number_2)
        ");
        $exist_info->execute([
            ":email" => $email,
            ":phone_number" => $phone_number,
            ":phone_number_2" => $phone_number_2
        ]);

        if ($exist_info->fetchColumn() > 0) {
            $error = "Cet utilisateur existe déjà.";
        } else {
            // Génération et hachage du mot de passe
            $password = generatePassword();
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Insertion dans la base
            $insert_info = $connexion->prepare("
                INSERT INTO tlbl_users
                (uuid, first_name, last_name, email, phone_number, phone_number_2, address, password)
                VALUES
                (:uuid, :first_name, :last_name, :email, :phone_number, :phone_number_2, :address, :password)
            ");

            $executed = $insert_info->execute([
                ":uuid" => $uuid,
                ":first_name" => $first_name,
                ":last_name" => $last_name,
                ":email" => $email,
                ":phone_number" => $phone_number,
                ":phone_number_2" => $phone_number_2,
                ":address" => $address,
                ":password" => $password_hash
            ]);

            if ($executed) {
                $success = "Utilisateur ajouté avec succès. Mot de passe : <b>$password</b>";
            } else {
                $error = "Une erreur est survenue lors de l'ajout.";
            }
        }
    }
}
?>
