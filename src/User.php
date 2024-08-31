<?php
namespace App;
class User
{
    private $isLoggedIn = false;

    public function login($username, $password)
    {
        // Simulate a successful login
        $this->isLoggedIn = true;
    }

    public function getPersonalPage()
    {
        if ($this->isLoggedIn) {
            // Return a simple string representing the personal page
            return 'Personal page content';
        }

        return null;
    }
}

?>