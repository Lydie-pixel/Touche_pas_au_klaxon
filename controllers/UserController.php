<?php

require_once "models/UserModel.php";
require_once "helpers/auth.php";

class UserController {

    private $model;
    private $db;

    public function index() {

        requireAdmin();

        $users = $this->model->getAllUsers();
        require "views/users/index.php";
    }

    public function __construct($db) {
        $this->db = $db;
        $this->model = new UserModel($db);
    }

    public function create() {

        requireAdmin();
        
        require "views/users/create.php";
    }

    public function store() {

        requireAdmin();

        $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'tel' => $_POST['tel'],
            'password' => $_POST['password'],
            'role' => $_POST['role']
        ];

        $this->model->create($data);

        $_SESSION['success'] = "Utilisateur créé avec succès ";

        header("Location: /TOUCHE_PAS_AU_KLAXON/");
        exit;
    }
}