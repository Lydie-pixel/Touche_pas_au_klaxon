<?php

require_once "models/AgenceModel.php";
require_once "helpers/auth.php";

class AgenceController {

    private $model;
    private $db;

/**
 * Display the list of agencies
 *
 * @return void
 */

    public function index() {

    $title = "Gestion des agences";

    requireAdmin();

    $agences = $this->model->getAllAgences();
    require "views/agences/index.php";
    }

    public function __construct($db) {
        requireLogin();
        $this->db = $db;
        $this->model = new AgenceModel($db);
    }
/**
 * Display the form to create a new agency
 * @return void
 */
    public function create() {

    requireAdmin();

        require "views/agences/create.php";
    }

/**
 * Store a new agency in database
 *
 * @return void
 */

    public function store() {

    if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
    die("Requête invalide");
    }

    requireAdmin();

        $data = [
            'name' => $_POST['name'],
        ];

        $this->model->create($data);

        $_SESSION['success'] = "Agence créée avec succès ";

        header("Location: /TOUCHE_PAS_AU_KLAXON/");
        exit;
    }

/**
 * Delete an agency
 * @param int $id Agency ID
 * @return bool
 */
    public function delete($id) {

    requireAdmin();

    if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
    die("Requête invalide");
    }

    if ($this->model->isUsed($id)) {
        $_SESSION['error'] = "Cette agence ne pourra pas être supprimée tant qu'elle est utilisée dans des trajets";
        header("Location: /TOUCHE_PAS_AU_KLAXON/agences");
        exit;
    }

    $this->model->delete($id);

    $_SESSION['success'] = "Agence supprimée avec succès";
    header("Location: /TOUCHE_PAS_AU_KLAXON/agences");
    exit;
}
}