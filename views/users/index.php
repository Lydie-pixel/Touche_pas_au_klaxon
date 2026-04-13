<?php ob_start(); ?>

<h2>Gestion des utilisateurs</h2>

    <table class="table table-striped">
        <thead class="table-dark">
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
                        <?= htmlspecialchars($user['last_name']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($user['first_name']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($user['tel']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($user['email']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($user['role']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php $content = ob_get_clean(); ?>

<?php require "views/layout.php"; ?>