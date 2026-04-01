<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<?php require "views/partials/header.php"; ?>

<h2>Trajets disponibles</h2>


<table class="table table-striped">
    <thead>
        <tr>
            <th>Départ</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Destination</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Places</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($trajets as $t): ?>

            <tr>
                <td><?= $t['departure_name'] ?></td>

                <td>
                    <?= date('d/m/Y', strtotime($t['date_depart'])) ?>
                </td>

                <td>
                    <?= date('H:i', strtotime($t['date_depart'])) ?>
                </td>

                <td><?= $t['arrival_name'] ?></td>

                <td>
                    <?= date('d/m/Y', strtotime($t['date_arrival'])) ?>
                </td>

                <td>
                    <?= date('H:i', strtotime($t['date_arrival'])) ?>
                </td>

                <td><?= $t['seats_available'] ?></td>

                <td>

                    <?php if (isset($_SESSION['user'])): ?>

                        <!-- Voir détails -->
                        <a href="#" class="text-primary me-2" title="Voir">
                            <i class="bi bi-eye"></i>
                        </a>

                        <?php if ($_SESSION['user']['id'] == $t['user_id']): ?>

                            <!-- Modifier -->
                            <a href="#" class="text-warning me-2" title="Modifier">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <!-- Supprimer -->
                            <a href="#" class="text-danger" title="Supprimer">
                                <i class="bi bi-trash3"></i>
                            </a>

                        <?php elseif ($_SESSION['user']['role'] === 'admin'): ?>

                            <!-- Admin peut aussi modifier -->
                            <a href="#" class="text-warning me-2" title="Modifier">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <a href="#" class="text-danger" title="Supprimer">
                                <i class="bi bi-trash3"></i>
                            </a>

                        <?php endif; ?>

                    <?php endif; ?>

                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>