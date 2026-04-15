<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../controllers/helpers/auth.php';

class AuthHelperTest extends TestCase {

public function testRequireLoginRedirectsIfNotLogged() {

    $_SESSION = [];

    $this->expectException(Exception::class);

    requireLogin();
}
}
