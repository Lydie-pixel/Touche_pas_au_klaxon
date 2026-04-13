<?php

require_once "models/TrajetModel.php";

class TrajetController {

    private $model;
    private $db;

    public function index() {

    $trajets = $this->model->getAvailableTrips();
    
    require "views/trajets/index.php";
    }

    public function __construct($db) {
        $this->db = $db;
        $this->model = new TrajetModel($db);
    }

    public function create() {
        requireLogin();


        // récupérer les agences pour le formulaire
        $agences = $this->db->query("SELECT * FROM agences")->fetchAll();

        require "views/trajets/create.php";
    }

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

    public function edit($id) {
    requireLogin();

    if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
    die("Requête invalide");
    }

    $trajet = $this->model->find($id);
    $agences = $this->db->query("SELECT * FROM agences")->fetchAll();

    require "views/trajets/edit.php";
}

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

public function delete($id) {
    requireLogin();

    if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
    die("Requête invalide");
    }

    $this->model->delete($id);

    $_SESSION['success'] = "Trajet supprimé avec succès";

    header("Location: /TOUCHE_PAS_AU_KLAXON/");
    exit;
}
}