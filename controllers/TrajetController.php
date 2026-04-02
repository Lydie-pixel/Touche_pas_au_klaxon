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


        // récupérer les agences pour le formulaire
        $agences = $this->db->query("SELECT * FROM agences")->fetchAll();

        require "views/trajets/create.php";
    }

    public function store() {


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
}