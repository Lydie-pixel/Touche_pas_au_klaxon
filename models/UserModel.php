<?php

class UserModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

/**
 * Find a user by email
 *
 * @param string $email
 * @return array|false
 */
    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);

        return $stmt->fetch();
    }

/**
 * Get all users from database
 *
 * @return array
 */
    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        return $this->db->query($sql)->fetchAll();
    }


/**
 * Create a new user in database
 * Not used in current application (users are managed externally)
 * but available for future use.
 *
 * @param array<string, mixed> $data User data
 * @return bool
 */
public function create($data) {
    $sql = "INSERT INTO users (first_name, last_name, email, tel, password, role)
            VALUES (:first_name, :last_name, :email, :tel, :password, :role)";
    
    $stmt = $this->db->prepare($sql);
    return $stmt->execute($data);
}
}