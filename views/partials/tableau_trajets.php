<table class="table table-striped">
    <thead class="table-dark">
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
                <td>
                    <?= htmlspecialchars($t['departure_name']) ?>
                </td>

                <td>
                    <?= htmlspecialchars(date('d/m/Y', strtotime($t['date_depart']))) ?>
                </td>

                <td>
                    <?= htmlspecialchars(date('H:i', strtotime($t['date_depart']))) ?>
                </td>

                <td>
                    <?= htmlspecialchars($t['arrival_name']) ?>
                </td>

                <td>
                    <?= htmlspecialchars(date('d/m/Y', strtotime($t['date_arrival']))) ?>
                </td>

                <td>
                    <?= htmlspecialchars(date('H:i', strtotime($t['date_arrival']))) ?>
                </td>
                
                <td>
                    <?= htmlspecialchars($t['seats_available']) ?>
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
                            <a href="/Touche_pas_au_klaxon/trajets/edit/<?= $t['id'] ?>"class="text-dark" title="Modifier">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <!-- Supprimer -->
                            <button 
                                class="btn btn-link text-dark"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal<?= $t['id'] ?>">
                                <i class="bi bi-trash3"></i>
                            </button>

                        <?php elseif ($_SESSION['user']['role'] === 'admin'): ?>

                            <!-- Admin peut modifier -->
                            <a href="/Touche_pas_au_klaxon/trajets/edit/<?= $t['id'] ?>" class="text-dark me-2" title="Modifier">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <button 
                                class="btn btn-link text-dark"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModalTrajet<?= $t['id'] ?>">
                                <i class="bi bi-trash3"></i>
                            </button>

                        <?php endif; ?>

                    <?php endif; ?>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>