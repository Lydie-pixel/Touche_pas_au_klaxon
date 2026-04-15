<?php ob_start(); ?>

    <?php require "views/partials/tableau_trajets.php"; ?>


    <?php foreach ($trajets as $t): ?>

        <!-- ligne tableau -->

        <?php require "views/partials/modal.php"; ?>

    <?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require "views/layout.php"; ?>