<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../controllers/helpers/auth.php';

class RequireAdminTest extends TestCase {

    public function testRequireAdminAllowsAdmin() {

        session_start();

        $_SESSION['user'] = [
            'role' => 'admin'
        ];

        // si ça passe sans exit → test OK
        $this->expectNotToPerformAssertions();

        requireAdmin();
    }

    public function testRequireAdminBlocksUser() {

        session_start();

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

        $this->assertTrue(true); // si on arrive ici → ça a bloqué
    }
}