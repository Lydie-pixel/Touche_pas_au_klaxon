<?php

class TrajetModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

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

    public function create($data) {

        $sql = "INSERT INTO trajets 
                (user_id, departure_id, arrival_id, date_depart, date_arrival, seats_total, seats_available)
                VALUES (:user_id, :departure_id, :arrival_id, :date_depart, :date_arrival, :seats_total, :seats_available)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }
}