<?php
use PHPUnit\Framework\TestCase;
use App\User;
class UserTest extends TestCase
{
    public function testUserCanAccessPersonalPage()
    {
    // Create a new User instance
    $user = new User();

    // Simulate user login
    $user->login('username', 'password');

    // Get the user's personal page
    $page = $user->getPersonalPage();

    // Assert that the page is not null (i.e., the user could access it)
    $this->assertNotNull($page);
    }
}