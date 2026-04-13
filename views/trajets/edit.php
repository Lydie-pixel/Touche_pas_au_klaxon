<?php ob_start(); ?>

<h2>Modifier un trajet</h2>

    <form method="POST" action="/TOUCHE_PAS_AU_KLAXON/trajets/edit/<?= $trajet['id'] ?>">

    <select name="departure_id">
        <label>Départ</label>
        <?php foreach ($agences as $a): ?>
            <option value="<?= $a['id'] ?>" <?= $a['id'] == $trajet['departure_id'] ? 'selected' : '' ?>>
                <?= $a['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

        <br><br>

        <label>Destination</label>
        <select name="arrival_id" required>
            <?php foreach ($agences as $a): ?>
                <option value="<?= $a['id'] ?>" <?= $a['id'] == $trajet['arrival_id'] ? 'selected' : '' ?>>
                    <?= $a['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <br><br>

        <label>Date départ</label>
        <input type="datetime-local" name="date_depart" value="<?= $trajet['date_depart'] ?>">

        <br><br>

        <label>Date arrivée</label>
        <input type="datetime-local" name="date_arrival" value="<?= $trajet['date_arrival'] ?>">

        <br><br>

        <label>Nombre de places</label>
        <input type="number" name="seats_total" value="<?= $trajet['seats_total'] ?>">

        <label>Nombre de places disponibles</label>
        <input type="number" name="seats_available" value="<?= $trajet['seats_available'] ?>">

        <br><br>

        <button class="btn btn-dark">Modifier</button>

    </form>

<?php $content = ob_get_clean(); ?>
<?php require "views/layout.php"; ?>