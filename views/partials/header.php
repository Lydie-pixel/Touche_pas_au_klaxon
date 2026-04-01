<?php session_start(); ?>

<h1>Touche pas au klaxon</h1>

<nav>

<?php if (!isset($_SESSION['user'])): ?>

    <a href="/TOUCHE_PAS_AU_KLAXON/login">Connexion</a>

<?php else: ?>

    <?php if (isset($_SESSION['user'])): ?>
        <span>
            Bonjour <?= htmlspecialchars($_SESSION['user']['first_name']) ?>
            <?= htmlspecialchars($_SESSION['user']['last_name']) ?>
        </span>
    <?php endif; ?>

    <a href="/TOUCHE_PAS_AU_KLAXON/logout">Déconnexion</a>

<?php endif; ?>

</nav>