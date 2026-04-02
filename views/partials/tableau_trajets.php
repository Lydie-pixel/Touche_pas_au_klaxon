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
        </tr>
    </thead>

    <tbody>
        <?php foreach ($trajets as $t): ?>
            <tr>
                <td>
                    <?= $t['departure_name'] ?>
                </td>

                <td>
                    <?= date('d/m/Y', strtotime($t['date_depart'])) ?>
                </td>

                <td>
                    <?= date('H:i', strtotime($t['date_depart'])) ?>
                </td>

                <td>
                    <?= $t['arrival_name'] ?>
                </td>

                <td>
                    <?= date('d/m/Y', strtotime($t['date_arrival'])) ?>
                </td>

                <td>
                    <?= date('H:i', strtotime($t['date_arrival'])) ?>
                </td>
                
                <td>
                    <?= $t['seats_available'] ?>
                </td>

                <td>
                    <?php if (isset($_SESSION['user'])): ?>

                        <!-- Voir détails -->
                        <a href="#" 
                            class="text-dark me-2"
                            title="Voir détails"
                            data-bs-toggle="modal" 
                            data-bs-target="#modal<?= $t['id'] ?>">
                                <i class="bi bi-eye"></i>
                        </a>

                        <?php if ($_SESSION['user']['id'] == $t['user_id']): ?>

                            <!-- Modifier -->
                            <a href="#" class="text-dark me-2" title="Modifier">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <!-- Supprimer -->
                            <a href="#" class="text-dark" title="Supprimer">
                                <i class="bi bi-trash3"></i>
                            </a>

                        <?php elseif ($_SESSION['user']['role'] === 'admin'): ?>

                            <!-- Admin peut aussi modifier -->
                            <a href="#" class="text-dark me-2" title="Modifier">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <a href="#" class="text-dark" title="Supprimer">
                                <i class="bi bi-trash3"></i>
                            </a>

                        <?php endif; ?>

                    <?php endif; ?>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>