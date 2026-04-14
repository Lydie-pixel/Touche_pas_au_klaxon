<?php

require_once "models/UserModel.php";
require_once "helpers/auth.php";

class UserController {

    private $model;
    private $db;

/**
 * Display the list of users
 *
 * @return void
 */
    public function index() {

        requireAdmin();

        $users = $this->model->getAllUsers();
        require "views/users/index.php";
    }

    public function __construct($db) {
        requireLogin();
        $this->db = $db;
        $this->model = new UserModel($db);
    }

/**
 * User creation is not implemented
 * as users are managed externally (as per project requirements)
 */

/**
 * Store a new user in database
 *
 * @return void
 */
    public function store() {

        requireAdmin();

        if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
        die("Requête invalide");
        }
        
        $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'tel' => $_POST['tel'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'role' => $_POST['role']
        ];

        $this->model->create($data);

        $_SESSION['success'] = "Utilisateur créé avec succès ";

        header("Location: /TOUCHE_PAS_AU_KLAXON/");
        exit;
    }
}