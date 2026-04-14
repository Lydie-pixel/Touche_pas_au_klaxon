<?php

class AgenceModel {

    private $db;

        public function __construct($db) {
        $this->db = $db;
    }

/**
 * Get all agencies from database
 *
 * @return array
 */
    public function getAllAgences() {
        $sql = "SELECT * FROM agences";
        return $this->db->query($sql)->fetchAll();
    }

/**
 * Delete a specific agency from database
 * Checks if the agency is used in any trip before deletion
 * @param int $id Agency ID
 * @return bool
 */
    public function delete($id) {
    $sql = "DELETE FROM agences WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    return $stmt->execute(['id' => $id]);
}

/**
 * Create a new agency in database
 * @param array $data Agency data
 * @return bool
 */
    public function create($data) {
        $sql = "INSERT INTO agences (name) VALUES (:name)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }
/**
 * Check if an agency is used in any trip
 * @param int $id Agency ID
 * @return bool
 */
    public function isUsed($id) {
    $sql = "SELECT COUNT(*) FROM trajets 
            WHERE departure_id = :id OR arrival_id = :id";

    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id]);

    return $stmt->fetchColumn() > 0;
}
}