<?php
include("../database/connexion.php");
include("../fonctions/fonction.php");


$error = "";
$success = "";


if(isset($_POST["update_users"])){
    $uuid = $_POST["uuid"] ?? null;
    $first_name  = $_POST["first_name"] ?? null;
    $last_name = $_POST["last_name"] ?? null;
    $email = $_POST["email"] ?? null;
    $phone_number = $_POST["phone_number"] ?? null;
    $phone_number_2  = $_POST["phone_number_2"] ?? null;
    $address = $_POST["address"] ?? null;



    // Verifications de l'uncité des données

    $exists_info = $connexion->prepare("SELECT COUNT(*) FROM tlbl_users WHERE is_deleted = 1 AND  (email = :email OR phone_number = :phone_number OR phone_number_2 = :phone_number_2)");
    $exists_info->execute([
        ":email" => $email,
        "phone_number" => $phone_number,
        "phone_number_2" => $phone_number_2
    ]);
    if($exists_info->fetchColumn() > 0){
        $error = "Cet utilisateur existe dejà !";
    }else {
        $update_info = $connexion->prepare(query: "UPDATE tlbl_users SET first_name = :first_name, last_name = :last_name, email = :email, phone_number = :phone_number, phone_number_2 = :phone_number_2, address = :address WHERE uuid = :uuid"); 

        $update_info->execute([
        ':uuid'          => $uuid,
        ':first_name'    => $first_name,
        ':last_name'     => $last_name,
        ':email'         => $email,
        ':phone_number'  => $phone_number,
        ':phone_number_2'=> $phone_number_2,
        ':address'       => $address
        
        ]);


        if ($update_info) {
            $success ="Utilisateur modifié avec succès";
            
        }else {
            $error = "Erreur lors de la modification de l'utilisateur !";
        }

        
    }

}



?>