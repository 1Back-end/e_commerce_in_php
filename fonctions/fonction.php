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
function generateProductsCode() {
    // Générer un UUID pour garantir l'unicité
    $uuid = generate_uuid_v4();
    // Obtenir la date et l'heure actuelles pour la référence
    $dateTime = date('YmdHis'); // Format : AAAAMMJJHHMMSS
    // Combiner le tout pour créer une référence de commande unique
    return 'PRODUCT-' . $dateTime . '-' . substr($uuid, 0, 8); // Exemple : CMD-20231022123000-123e4567
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

function get_active_category_products($connexion){
    $category_product = $connexion->prepare('SELECT * FROM tlbl_category_product WHERE is_active = 1 AND is_deleted = 0 ORDER BY created_at DESC');
    $category_product->execute();
    return $category_product->fetchAll(PDO::FETCH_ASSOC);

}

function get_all_products($connexion, int $page = 1, int $limit = 25): array {
    $offset = ($page - 1) * $limit;

    // Récupérer le total des produits
    $count_products = $connexion->query("SELECT COUNT(*) FROM tlbl_products WHERE is_deleted = 0");
    $total = (int) $count_products->fetchColumn();
    $total_pages = max(1, ceil($total / $limit)); // éviter division par zéro

    //  Préparer la requête paginée
    $all_products = $connexion->prepare("
        SELECT 
            p.*, 
            c.name AS category_product
        FROM tlbl_products p
        JOIN tlbl_category_product c ON p.category_product_uuid = c.uuid
        WHERE p.is_deleted = 0 
        ORDER BY p.created_at DESC
        LIMIT :limit OFFSET :offset
    ");
    $all_products->bindValue(':limit', $limit, PDO::PARAM_INT);
    $all_products->bindValue(':offset', $offset, PDO::PARAM_INT);
    $all_products->execute();
    $products = $all_products->fetchAll(PDO::FETCH_ASSOC);

    return [
        'data' => $products,
        'total_pages' => $total_pages,
        'current_page' =>$page
];
}




function get_all_category($connexion, int $page = 1, int $limit = 25): array {
    $offset = ($page - 1) * $limit;

    // Récupérer le total des produits
    $count_category = $connexion->query("SELECT COUNT(*) FROM tlbl_category_product WHERE is_deleted = 0");
    $total = (int) $count_category->fetchColumn();
    $total_pages = max(1, ceil($total / $limit)); 

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
    $category = $all_category->fetchAll(PDO::FETCH_ASSOC);

    return [
        'data' => $category,
        'total_pages' => $total_pages,
        'current_page' => $page
    ];
}





?>