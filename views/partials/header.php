<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>

<header>
    
    <div class="container">

        <a href="/Touche_pas_au_klaxon/" class="btn text-dark">
            <h1>Touche pas au klaxon</h1>
        </a>

        <nav>

            <?php if (!isset($_SESSION['user'])): ?>

                <a href="/Touche_pas_au_klaxon/login" class="btn btn-dark">
                    Connexion
                </a>

            <?php else: ?>

                <!-- Utilisateur classique -->
                <?php if ($_SESSION['user']['role'] === 'user'): ?>
                    <a href="/Touche_pas_au_klaxon/trajets/create" class="btn btn-dark">
                        Créer un trajet
                    </a>
                <?php endif; ?>

                <!-- Admin -->
                <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                    <a href="/Touche_pas_au_klaxon/users" class="btn btn-secondary">Utilisateurs</a>
                    <a href="/Touche_pas_au_klaxon/agences" class="btn btn-secondary">Agences</a>
                    <a href="/Touche_pas_au_klaxon/trajets" class="btn btn-secondary">Trajets</a>
                <?php endif; ?>

                <!-- Bonjour -->
                <span>
                    Bonjour <?= htmlspecialchars($_SESSION['user']['first_name']) ?>
                    <?= htmlspecialchars($_SESSION['user']['last_name']) ?>
                </span>

                <!-- Logout -->
                <a href="/Touche_pas_au_klaxon/logout" class="btn btn-dark">
                    Déconnexion
                </a>

            <?php endif; ?>

        </nav>
    </div>
</header>