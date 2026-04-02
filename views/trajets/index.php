<?php ob_start(); ?>

<h2>Gestion des trajets</h2>

<?php require "views/partials/tableau_trajets.php"; ?>
<?php require "views/partials/modal.php"; ?>

<?php $content = ob_get_clean(); ?>
<?php require "views/layout.php"; ?>