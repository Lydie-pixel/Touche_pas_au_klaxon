<?php

class TrajetModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

/**
 * Get all available trips from database
 *
 * @return array
 */
    public function getAvailableTrips() {
        $sql = "SELECT t.*, 
                    a1.name AS departure_name,
                    a2.name AS arrival_name,
                    u.first_name,
                    u.last_name,
                    u.email,
                    u.tel
                FROM trajets t
                JOIN agences a1 ON t.departure_id = a1.id
                JOIN agences a2 ON t.arrival_id = a2.id
                JOIN users u ON t.user_id = u.id
                WHERE t.seats_available > 0
                AND t.date_depart > NOW()
                ORDER BY t.date_depart ASC";

        return $this->db->query($sql)->fetchAll();
    }

/**
 * Create a new trip in database
 *
 * @param array $data Trip data
 * @return bool
 */
    public function create($data) {

        $sql = "INSERT INTO trajets 
                (user_id, departure_id, arrival_id, date_depart, date_arrival, seats_total, seats_available)
                VALUES (:user_id, :departure_id, :arrival_id, :date_depart, :date_arrival, :seats_total, :seats_available)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

/**
 * Find a trip by ID
 *
 * @param int $id Trip ID
 * @return array|false
 */
    public function find($id) {
    $sql = "SELECT * FROM trajets WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

/**
 * Update a specific trip in database
 *
 * @param int $id Trip ID
 * @param array $data Trip data
 * @return bool
 */
public function update($id, $data) {
    $sql = "UPDATE trajets SET 
        departure_id = :departure_id,
        arrival_id = :arrival_id,
        date_depart = :date_depart,
        date_arrival = :date_arrival,
        seats_total = :seats_total,
        seats_available = :seats_available
        WHERE id = :id";

    $stmt = $this->db->prepare($sql);
    $data['id'] = $id;
    return $stmt->execute($data);
}
/**
 * Delete a specific trip from database
 *
 * @param int $id Trip ID
 * @return bool
 */
public function delete($id) {
    $sql = "DELETE FROM trajets WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    return $stmt->execute(['id' => $id]);
}
}