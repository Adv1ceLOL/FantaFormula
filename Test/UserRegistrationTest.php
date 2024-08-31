<?php

use PHPUnit\Framework\TestCase;
require_once 'Register.php';

class UserRegistrationTest extends TestCase
{
    public function testUserCanRegister()
    {
        // Create a mock of the database connection object
        $conn = $this->createMock(mysqli::class);

        // Configure the mock to respond to the 'query' method call
        $conn->method('query')->willReturn(true);

        // Create a new Register object
        $register = new Register($conn);

        // Call the registerUser method with username, email, password
        $result = $register->registerUser('test', 'test@example.com', 'Testpassword1');

        // Verify that the user was registered successfully
        $this->assertEquals('Thanks for register :)', $result);
    }

    public function testUserCannotRegisterWithExistingUsername()
    {
        // Create a mock of the database connection object
        $conn = $this->createMock(mysqli::class);

        // Configure the mock to respond to the 'query' method call
        $conn->method('query')->willReturn(false);

        // Create a new Register object
        $register = new Register($conn);

        // Call the registerUser method with an existing username
        $result = $register->registerUser('AdviceLOL', 'test2@example.com', 'Testpassword2');

        // Verify that the registration failed
        $this->assertEquals('User already registered. Please Login', $result);
    }
}