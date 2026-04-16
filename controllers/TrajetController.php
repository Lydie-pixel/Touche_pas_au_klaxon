<?php

require_once "models/TrajetModel.php";
require_once "helpers/auth.php";

class TrajetController {

    private $model;
    private $db;

/**
 * Display the list of available trips
 *
 * @return void
 */
    public function index() {

    $trajets = $this->model->getAvailableTrips();
    
    require "views/trajets/index.php";
    }

    public function __construct($db) {
        $this->db = $db;
        $this->model = new TrajetModel($db);
    }

/**
 * Show create form for a new trip
 *
 * @return void
 */

    public function create() {
        requireLogin();


        // récupérer les agences pour le formulaire
        $agences = $this->db->query("SELECT * FROM agences")->fetchAll();

        require "views/trajets/create.php";
    }

/**
 * Store a new trip in database
 *
 * @return void
 */
    public function store() {
        requireLogin();

        if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
        die("Requête invalide");
        }

        $data = [
        'user_id' => $_SESSION['user']['id'],
        'departure_id' => $_POST['departure_id'],
        'arrival_id' => $_POST['arrival_id'],
        'date_depart' => $_POST['date_depart'],
        'date_arrival' => $_POST['date_arrival'],
        'seats_total' => $_POST['seats_total'],
        'seats_available' => $_POST['seats_available']
    ];

    // Vérifications métier

    if ($data['departure_id'] === $data['arrival_id']) {
        $_SESSION['error'] = "Départ et arrivée doivent être différents";
        header("Location: /Touche_pas_au_klaxon/trajets/create");
        exit;
    }

    if ($data['seats_total'] < 1) {
        $_SESSION['error'] = "Le nombre de places doit être supérieur à 0";
        header("Location: /Touche_pas_au_klaxon/trajets/create");
        exit;
    }

    if ($data['date_arrival'] <= $data['date_depart']) {
        $_SESSION['error'] = "La date d’arrivée doit être après la date de départ";
        header("Location: /Touche_pas_au_klaxon/trajets/create");
        exit;
    }

    if ($_POST['seats_available'] > $_POST['seats_total']) {
    $_SESSION['error'] = "Les places disponibles ne peuvent pas dépasser le total";
    header("Location: /Touche_pas_au_klaxon/trajets/create");
    exit;
    }

        $this->model->create($data);

        $_SESSION['success'] = "Trajet créé avec succès ";

        header("Location: /Touche_pas_au_klaxon/");
        exit;
    }

/**
 * Show edit form for a specific trip
 *
 * @param int $id Trip ID
 * @return void
 */
    public function edit($id) {
    requireLogin();

    $trajet = $this->model->find($id);
    $agences = $this->db->query("SELECT * FROM agences")->fetchAll();

    require "views/trajets/edit.php";
}

/**
 * Update a specific trip in database
 *
 * @param int $id Trip ID
 * @return void
 */
public function update($id) {
    requireLogin();

    if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
    die("Requête invalide");
    }

    $data = [
        'departure_id' => $_POST['departure_id'],
        'arrival_id' => $_POST['arrival_id'],
        'date_depart' => $_POST['date_depart'],
        'date_arrival' => $_POST['date_arrival'],
        'seats_total' => $_POST['seats_total'],
        'seats_available' => $_POST['seats_available']
    ];

    // Vérifications métier

    if ($data['departure_id'] === $data['arrival_id']) {
        $_SESSION['error'] = "Départ et arrivée doivent être différents";
        header("Location: /Touche_pas_au_klaxon/trajets/create");
        exit;
    }

    if ($data['seats_total'] < 1) {
        $_SESSION['error'] = "Le nombre de places doit être supérieur à 0";
        header("Location: /Touche_pas_au_klaxon/trajets/create");
        exit;
    }

    if ($data['date_arrival'] <= $data['date_depart']) {
        $_SESSION['error'] = "La date d’arrivée doit être après la date de départ";
        header("Location: /Touche_pas_au_klaxon/trajets/create");
        exit;
    }

    if ($_POST['seats_available'] > $_POST['seats_total']) {
    $_SESSION['error'] = "Places disponibles invalides";
    header("Location: /Touche_pas_au_klaxon/trajets/create");
    exit;
}

    $this->model->update($id, $data);

    $_SESSION['success'] = "Trajet modifié avec succès";

    header("Location: /Touche_pas_au_klaxon/");
    exit;
}

/**
 * Delete a specific trip from database
 *
 * @param int $id Trip ID
 * @return void
 */
public function delete($id) {
    requireLogin();

    $trajet = $this->model->find($id);

    if ($_SESSION['user']['role'] !== 'admin' && 
        $trajet['user_id'] != $_SESSION['user']['id']) {
        die("Accès interdit");
    }

    $this->model->delete($id);

    $_SESSION['success'] = "Trajet supprimé avec succès";

    header("Location: /touche_pas_au_klaxon/");
    exit;
}
}