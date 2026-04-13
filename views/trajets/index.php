<?php ob_start(); ?>

<h2>Gestion des trajets</h2>

<?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
        <a href="/TOUCHE_PAS_AU_KLAXON/trajets/create" class="btn btn-secondary">+ Ajouter</a>
    <?php endif; ?>

<?php require "views/partials/tableau_trajets.php"; ?>
<?php require "views/partials/modal.php"; ?>

<?php $content = ob_get_clean(); ?>
<?php require "views/layout.php"; ?>