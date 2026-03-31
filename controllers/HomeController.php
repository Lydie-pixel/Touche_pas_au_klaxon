<?php

require_once "models/TrajetModel.php";

class HomeController {

    private $model;

    public function __construct($db) {
        $this->model = new TrajetModel($db);
    }

    public function index() {
        $trajets = $this->model->getAvailableTrips();

        require "views/home.php";
    }
}