<?php

class TrajetModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAvailableTrips() {
        $sql = "SELECT t.*, 
                       a1.name AS departure_name,
                       a2.name AS arrival_name
                FROM trajets t
                JOIN agences a1 ON t.departure_id = a1.id
                JOIN agences a2 ON t.arrival_id = a2.id
                WHERE t.seats_available > 0
                AND t.date_depart > NOW()
                ORDER BY t.date_depart ASC";

        return $this->db->query($sql)->fetchAll();
    }
}