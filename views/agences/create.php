<?php ob_start(); ?>

    <h2>Ajouter une agence</h2>

    <form method="POST" action="/Touche_pas_au_klaxon/agences/create">
        <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">

        <label>Nom de la ville</label>
        <input type="text" name="name" required class="form-control">

        <br>

        <button class="btn btn-dark">Ajouter</button>
    </form>

    <a href="/Touche_pas_au_klaxon/agences" class="btn btn-secondary mt-3">
        Retour
    </a>

<?php $content = ob_get_clean(); ?>
<?php require "views/layout.php"; ?>