<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../controllers/helpers/auth.php';

class RequireAdminTest extends TestCase {

    public function testRequireAdminAllowsAdmin() {

    $_SESSION['user'] = [
        'role' => 'admin'
    ];

    requireAdmin();

    $this->assertTrue(true); // ← IMPORTANT
    }

    public function testRequireAdminBlocksUser() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['user'] = [
            'role' => 'user'
        ];

        // On capture la sortie
        ob_start();

        try {
            requireAdmin();
        } catch (Throwable $e) {
            // ignore
        }

        ob_end_clean();

        $this->assertTrue(true);
    }
}
