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

        session_start();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->model->findByEmail($email);

        if ($user && $password === $user['password']) {

            $_SESSION['user'] = $user;

            header("Location: /TOUCHE_PAS_AU_KLAXON/");
            exit;

        } else {
            echo "Identifiants incorrects";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /TOUCHE_PAS_AU_KLAXON/");
    }
}