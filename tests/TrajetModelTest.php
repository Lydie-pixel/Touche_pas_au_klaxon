<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../models/TrajetModel.php';

class TrajetModelTest extends TestCase {

    public function testGetAvailableTripsReturnsArray() {

        // Fake DB (simulation simple)
        $db = $this->createMock(PDO::class);

        $stmt = $this->createMock(PDOStatement::class);

        $stmt->method('fetchAll')->willReturn([]);

        $db->method('query')->willReturn($stmt);

        $model = new TrajetModel($db);

        $result = $model->getAvailableTrips();

        $this->assertIsArray($result);
    }

    public function testCreateReturnsTrue() {

    $db = $this->createMock(PDO::class);
    $stmt = $this->createMock(PDOStatement::class);

    $stmt->method('execute')->willReturn(true);

    $db->method('prepare')->willReturn($stmt);

    $model = new TrajetModel($db);

    $data = [
        'user_id' => 1,
        'departure_id' => 1,
        'arrival_id' => 2,
        'date_depart' => '2026-01-01 10:00:00',
        'date_arrival' => '2026-01-01 12:00:00',
        'seats_total' => 4,
        'seats_available' => 4
    ];

    $result = $model->create($data);

    $this->assertTrue($result);
}
}