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
        'seats_available' => $_POST['seats_total']
    ];

        $this->model->create($data);

        $_SESSION['success'] = "Trajet créé avec succès ";

        header("Location: /TOUCHE_PAS_AU_KLAXON/");
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

    $this->model->update($id, $data);

    $_SESSION['success'] = "Trajet modifié avec succès";

    header("Location: /TOUCHE_PAS_AU_KLAXON/");
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

    $this->model->delete($id);

    $_SESSION['success'] = "Trajet supprimé avec succès";

    header("Location: /TOUCHE_PAS_AU_KLAXON/");
    exit;
}
}