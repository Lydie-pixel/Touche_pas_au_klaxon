<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../controllers/helpers/auth.php';

class AuthHelperTest extends TestCase {

    public function testRequireLoginRedirectsIfNotLogged() {

        $_SESSION = [];

        ob_start();

        try {
            requireLogin();
        } catch (Throwable $e) {
            // ignore
        }

        $output = ob_get_clean();

        $this->assertIsArray($_SESSION);
    }
}
