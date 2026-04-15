<?php ob_start(); ?>

    <h2>Créer un trajet</h2>

    <form method="POST" action="/TOUCHE_PAS_AU_KLAXON/trajets/create">
        <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">

        <label>Départ</label>
        <select name="departure_id" required>
            <?php foreach ($agences as $a): ?>
                <option value="<?= $a['id'] ?>"><?= $a['name'] ?></option>
            <?php endforeach; ?>
        </select>

        <br><br>

        <label>Destination</label>
        <select name="arrival_id" required>
            <?php foreach ($agences as $a): ?>
                <option value="<?= $a['id'] ?>"><?= $a['name'] ?></option>
            <?php endforeach; ?>
        </select>

        <br><br>

        <label>Date départ</label>
        <input type="datetime-local" name="date_depart" required>

        <br><br>

        <label>Date arrivée</label>
        <input type="datetime-local" name="date_arrival" required>

        <br><br>

        <label>Nombre de places disponibles</label>
        <input type="number" name="seats_available" min="1" required>

        <br><br>

        <label>Nombre de places total</label>
        <input type="number" name="seats_total" min="1" required>

        <br><br>

        <button class="btn btn-dark">Créer</button>

    </form>

<?php $content = ob_get_clean(); ?>
<?php require "views/layout.php"; ?>