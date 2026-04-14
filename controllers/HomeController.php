<?php

require_once "models/TrajetModel.php";

class HomeController {

    private $model;

    public function __construct($db) {
        $this->model = new TrajetModel($db);
    }

/**
 * Display the list of available trips
 *
 * @return void
 */
    public function index() {
        $trajets = $this->model->getAvailableTrips();

            // Titre dynamique
    if (!isset($_SESSION['user'])) {
        $title = "Pour obtenir plus d'informations sur un trajet, veuillez vous connecter";
    } elseif ($_SESSION['user']['role'] === 'admin') {
        $title = "Gestion des trajets";
    } else {
        $title = "Trajets proposés";
    }
    
    require "views/home.php";
    }
}