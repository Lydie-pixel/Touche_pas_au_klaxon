<?php

class UserModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);

        return $stmt->fetch();
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        return $this->db->query($sql)->fetchAll();
    }

}