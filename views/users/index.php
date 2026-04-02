<?php ob_start(); ?>

<h2>Gestion des utilisateurs</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <?= $user['last_name'] ?>
                    </td>

                    <td>
                        <?= $user['first_name'] ?>
                    </td>

                    <td>
                        <?= $user['tel'] ?>
                    </td>

                    <td>
                        <?= $user['email'] ?>
                    </td>

                    <td>
                        <?= $user['role'] ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php $content = ob_get_clean(); ?>

<?php require "views/layout.php"; ?>