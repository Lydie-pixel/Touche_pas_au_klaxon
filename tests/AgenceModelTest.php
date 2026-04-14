<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../models/AgenceModel.php';

class AgenceModelTest extends TestCase {

    public function testIsUsedReturnsTrueWhenAgencyIsUsed() {

        $db = $this->createMock(PDO::class);
        $stmt = $this->createMock(PDOStatement::class);

        $stmt->method('execute')->willReturn(true);
        $stmt->method('fetchColumn')->willReturn(1);

        $db->method('prepare')->willReturn($stmt);

        $model = new AgenceModel($db);

        $result = $model->isUsed(1);

        $this->assertTrue($result);
    }
}