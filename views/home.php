<h1>Trajets disponibles</h1>

<?php foreach ($trajets as $t): ?>

    <div>
        <p>
            <?= $t['departure_name'] ?> → <?= $t['arrival_name'] ?>
        </p>
        <p>
            Départ : <?= $t['date_depart'] ?>
        </p>
        <p>
            Places restantes : <?= $t['seats_available'] ?>
        </p>
    </div>

    <hr>

<?php endforeach; ?>