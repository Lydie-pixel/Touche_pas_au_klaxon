<?php ob_start(); ?>

    <h2>Connexion</h2>

    <form method="POST" action="/Touche_pas_au_klaxon/login">

        <!-- CSRF token should be included in the form to prevent CSRF attacks. -->
        <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>"> 

        <input type="email" name="email" placeholder="Email" required>
        <br><br>

        <input type="password" name="password" placeholder="Mot de passe" required>
        <br><br>

        <button class="btn btn-dark" type="submit">Se connecter</button>

    </form>

<?php $content = ob_get_clean(); ?>

<?php require "views/layout.php"; ?>