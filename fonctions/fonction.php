<?php 

include("../database/connexion.php");
function generate_uuid_v4() {
    // Générer un UUID v4
    $data = random_bytes(16);
    // Modifier certains bits selon la spécification UUID
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // version 4
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // variant DCE 1.1
    return vsprintf('%s-%s-%s-%s-%s', str_split(bin2hex($data), 4));
}


function getCurrentYear() {
    return date("Y"); // Renvoie l'année actuelle au format 4 chiffres (ex. 2024)
}

function getCurrentDateTime() {
    return date("d-m-Y H:i:s"); // Renvoie la date et l'heure actuelles au format "AAAA-MM-JJ HH:MM:SS"
}

function generatePassword($len = 12) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*';
    $pwd = '';
    for ($i = 0; $i < $len; $i++) {
      $pwd .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $pwd;
}

function get_all_users($connexion, int $page = 1, int $limit = 25): array {
    $offset = ($page - 1) * $limit;

    // Récupérer le total des utilisateurs
    $count_users = $connexion->prepare("SELECT COUNT(*) FROM tlbl_users WHERE is_deleted = 0");
    $total = $count_users->fetchColumn();
    $total_pages = max(1, ceil($total / $limit)); // éviter division par zéro

    // Préparer la requête paginée
    $all_users = $connexion->prepare("
        SELECT * 
        FROM tlbl_users 
        WHERE is_deleted = 0 
        ORDER BY created_at DESC 
        LIMIT :limit OFFSET :offset
    ");
    $all_users->bindValue(':limit', $limit, PDO::PARAM_INT);
    $all_users->bindValue(':offset', $offset, PDO::PARAM_INT);
    $all_users->execute();
    $users = $all_users->fetchAll(PDO::FETCH_ASSOC);

    return [
        'data' => $users,
        'total_pages' => $total_pages,
        'current_page' => $page
    ];
}

function get_all_category($connexion, int $page = 1, int $limit = 25): array {
    $offset = ($page - 1) * $limit;

    // Récupérer le total des utilisateurs
    $count_category_product = $connexion->prepare("SELECT COUNT(*) FROM tlbl_category_product WHERE is_deleted = 0");
    $total = $count_category_product->fetchColumn();
    $total_pages = max(1, ceil($total / $limit)); // éviter division par zéro

    // Préparer la requête paginée
    $all_category = $connexion->prepare("
        SELECT * 
        FROM tlbl_category_product
        WHERE is_deleted = 0 
        ORDER BY created_at DESC 
        LIMIT :limit OFFSET :offset
    ");
    $all_category->bindValue(':limit', $limit, PDO::PARAM_INT);
    $all_category->bindValue(':offset', $offset, PDO::PARAM_INT);
    $all_category->execute();
    $category_product = $all_category->fetchAll(PDO::FETCH_ASSOC);

    return [
        'data' => $category_product,
        'total_pages' => $total_pages,
        'current_page' => $page
    ];
}






?>