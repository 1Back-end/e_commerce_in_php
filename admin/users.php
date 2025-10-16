<?php include("../include/menu.php");?>
<?php
require_once('../fonctions/fonction.php');

$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$pagination = get_all_users($connexion, $page);

$users = $pagination['data'];
$totalPages = $pagination['total_pages'];
$currentPage = $pagination['current_page'];
?>  




<div class="body-wrapper-inner">
    <div class="container-fluid mt-3 pb-5">

        <div class="col-lg-12 col-sm-12 mb-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="mb-0">
                    <h2 class="text-uppercase fw-bold">Liste des utilisateurs</h2>
                </div>
                <a href="add_users.php" class="btn btn-primary rounded-0">
                <i class="fa-solid fa-plus me-1"></i> Ajouter
                </a>
            </div>
        </div>

        <div class="col-lg-12 col-sm-12 mb-3">
    <?php if(!empty($_GET["message"])) : ?>
        <?php $message = $_GET["message"]; ?>
        <span class="text-info"><?php echo htmlspecialchars($message); ?> !</span>
    <?php endif; ?>
</div>

<div class="col-lg-12 col-sm-12 mb-3 mt-3">
    <div class="card shadow p-3 rounded-0 border-0">
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom complet</th>
                        <th scope="col">Email</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Rôle</th>
                        <th scope="col">Créé le</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $index => $user): ?>
                            <tr>
                                <td><?= ($index + 1) + ($currentPage - 1) * 25 ?></td>
                                <td><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td><?= htmlspecialchars($user['phone_number']) ?></td>
                                <td><?= htmlspecialchars($user['role']) ?></td>
                                <td><?= htmlspecialchars($user['created_at']) ?></td>
                                <td>
                                    <?php if ($user['is_active']): ?>
                                        <span class="badge bg-success border-0 rounded-0 text-white px-2 py-2">Actif</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger border-0 rounded-0 text-white px-2 py-2">Inactif</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <?php if ($user['is_active']): ?>
                                            <a href="desactivate_users.php?uuid=<?= htmlspecialchars($user['uuid']) ?>" class="badge bg-danger border-0 rounded-0 text-white text-decoration-none px-2 py-2 mx-2">Désactiver</a>
                                        <?php else: ?>
                                            <a href="activate_users.php?uuid=<?= htmlspecialchars($user['uuid']) ?>" class="badge bg-success border-0 rounded-0 text-white text-decoration-none px-2 py-2 mx-2">Activer</a>
                                        <?php endif; ?>

                                        <a href="update_users.php?uuid=<?= htmlspecialchars($user['uuid']) ?>" class="badge bg-warning border-0 rounded-0 text-white text-decoration-none px-2 py-2 mx-2">Modifier</a>
                                        <a href="delete_users.php?uuid=<?= htmlspecialchars($user['uuid']) ?>" class="badge bg-danger border-0 rounded-0 text-white text-decoration-none px-2 py-2 mx-2">Supprimer</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="12">Aucun utilisateur trouvé</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <ul class="pagination">
                <?php if ($currentPage > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $currentPage - 1 ?>">Précédent</a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $currentPage + 1 ?>">Suivant</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
