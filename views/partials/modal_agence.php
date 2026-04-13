<?php foreach ($agences as $agence): ?>
    <div class="modal fade" id="deleteModalAgence<?= $agence['id'] ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Supprimer cette agence ? 
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

                <form method="POST" action="/TOUCHE_PAS_AU_KLAXON/agences/delete/<?= $agence['id'] ?>" style="display:inline;">
                    
                    <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">
                    
                    <button class="btn btn-danger">Supprimer</button>
                </form>
            </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>
