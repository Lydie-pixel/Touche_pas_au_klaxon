<?php foreach ($trajets as $t): ?>

    <div class="modal fade" id="modal<?= $t['id'] ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <p><strong>Auteur :</strong> <?= $t['first_name'] ?> <?= $t['last_name'] ?></p>

                    <p><strong>Téléphone :</strong> <?= $t['tel'] ?></p>

                    <p><strong>Email :</strong> <?= $t['email'] ?></p>

                    <p><strong>Places totales :</strong> <?= $t['seats_total'] ?></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModalTrajet<?= $t['id'] ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Supprimer ce trajet ? 
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

                <a href="/TOUCHE_PAS_AU_KLAXON/trajets/delete/<?= $t['id'] ?>" 
                class="btn btn-danger">
                Supprimer
                </a>
            </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>