<?php

class AgenceModel {

    private $db;

        public function __construct($db) {
        $this->db = $db;
    }

    public function getAllAgences() {
        $sql = "SELECT * FROM agences";
        return $this->db->query($sql)->fetchAll();
    }

}