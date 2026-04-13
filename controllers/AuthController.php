<?php

require_once "models/UserModel.php";

class AuthController {

    private $model;

    public function __construct($db) {
        $this->model = new UserModel($db);
    }

    public function login() {
        require "views/login.php";
    }

public function authenticate() {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $this->model->findByEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: /TOUCHE_PAS_AU_KLAXON/");
        exit;
    } else {
        $_SESSION['error'] = "Identifiants incorrects";
        header("Location: /TOUCHE_PAS_AU_KLAXON/login");
        exit;
    }
}

public function logout() {
    session_unset();
    session_destroy();
    header("Location: /TOUCHE_PAS_AU_KLAXON/");
    exit;
}
}