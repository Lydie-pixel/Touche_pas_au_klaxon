<?php

require_once "models/AgenceModel.php";
require_once "helpers/auth.php";

class AgenceController {

    private $model;
    private $db;

    public function index() {

    requireAdmin();

    $agences = $this->model->getAllAgences();
    require "views/agences/index.php";
    }

    public function __construct($db) {
        $this->db = $db;
        $this->model = new AgenceModel($db);
    }

    public function create() {

    requireAdmin();
        require "views/agences/create.php";
    }

    public function store() {

    requireAdmin();

        $data = [
            'name' => $_POST['name'],
        ];

        $this->model->create($data);

        $_SESSION['success'] = "Agence créée avec succès ";

        header("Location: /TOUCHE_PAS_AU_KLAXON/");
        exit;
    }
}