<?php ob_start(); ?>

<h2>Modifier une agence</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Ville</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($agences as $agence): ?>
                <tr>
                    <td>
                        <?= $agence['name'] ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php $content = ob_get_clean(); ?>

<?php require "views/layout.php"; ?>