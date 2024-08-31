<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class SquadraTest extends TestCase
{
    private $client;

    protected function setUp(): void

    {
        $this->client = new Client([
            'base_uri' => 'http://localhost/login/',
            'exceptions' => false,
        ]);
    }
}
?>