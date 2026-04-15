<?php ob_start(); ?>

    <h2><?= $title ?></h2>

    <a href="/TOUCHE_PAS_AU_KLAXON/agences/create" class="btn btn-dark mb-3">
        + Ajouter une agence
    </a>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Ville</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($agences as $agence): ?>
                <tr>
                    <td><?= htmlspecialchars($agence['name']) ?></td>

                    <td>
                        <button 
                            class="btn btn-link text-dark"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModalAgence<?= $agence['id'] ?>">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php require "views/partials/modal_agence.php"; ?>

<?php $content = ob_get_clean(); ?>
<?php require "views/layout.php"; ?>
