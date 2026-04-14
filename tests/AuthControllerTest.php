<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../models/UserModel.php';

class AuthControllerTest extends TestCase {

    public function testAuthenticateSuccess() {

        $_SESSION = [];

        $db = $this->createMock(PDO::class);

        $userModel = $this->createMock(UserModel::class);

        $hashedPassword = password_hash('password123', PASSWORD_DEFAULT);

        $userModel->method('findByEmail')->willReturn([
            'id' => 1,
            'email' => 'test@test.com',
            'password' => $hashedPassword
        ]);

        $controller = new AuthController($db);

        // On injecte le mock
        $reflection = new ReflectionClass($controller);
        $property = $reflection->getProperty('model');
        $property->setAccessible(true);
        $property->setValue($controller, $userModel);

        $_POST['email'] = 'test@test.com';
        $_POST['password'] = 'password123';

        // On empêche le header() de casser le test
        ob_start();
        $controller->authenticate();
        ob_end_clean();

        $this->assertArrayHasKey('user', $_SESSION);
    }

    public function testAuthenticateFailsWithWrongPassword() {

    $_SESSION = [];

    $db = $this->createMock(PDO::class);
    $userModel = $this->createMock(UserModel::class);

    $userModel->method('findByEmail')->willReturn([
        'email' => 'test@test.com',
        'password' => password_hash('correct', PASSWORD_DEFAULT)
    ]);

    $controller = new AuthController($db);

    $reflection = new ReflectionClass($controller);
    $property = $reflection->getProperty('model');
    $property->setAccessible(true);
    $property->setValue($controller, $userModel);

    $_POST['email'] = 'test@test.com';
    $_POST['password'] = 'wrong';

    ob_start();
    $controller->authenticate();
    ob_end_clean();

    $this->assertEquals("Identifiants incorrects", $_SESSION['error']);
    $this->assertArrayNotHasKey('user', $_SESSION);
}
}