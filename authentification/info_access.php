
<?php
$role_user = $_SESSION['role'] ?? '';
$IsAdmin = ($role_user == "admin");
$IsUser = ($role_user == "user");

?>