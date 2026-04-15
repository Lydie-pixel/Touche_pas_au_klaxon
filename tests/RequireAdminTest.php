<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../controllers/helpers/auth.php';

class RequireAdminTest extends TestCase {

public function testRequireAdminBlocksUser() {

    $_SESSION['user'] = [
        'role' => 'user'
    ];

    $this->expectException(Exception::class);

    requireAdmin();
}
}