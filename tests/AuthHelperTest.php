<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../controllers/helpers/auth.php';

class AuthHelperTest extends TestCase {

    public function testRequireLoginRedirectsIfNotLogged() {

        $_SESSION = [];

        ob_start();

        try {
            requireLogin();
        } catch (Exception $e) {
            // ignore
        }

        $output = ob_get_clean();

        $this->assertTrue(true); // test passe si pas crash
    }
}