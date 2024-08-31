<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class LoginStartTest extends TestCase
{
    private $client;

    protected function setUp(): void
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost/login/',
            'exceptions' => false,
        ]);
    }

    public function testSubmitButtonSuccess()
    {
        // Simula l'invio di una richiesta POST a login.php
        $response = $this->client->post('login.php', [
            'form_params' => [
                'username' => 'AdviceLOL', 
                'password' => 'Stocazzo5', 
            ],
        ]);

        // Verifica che la risposta sia un successo
        $this->assertEquals(200, $response->getStatusCode());

        $body = (string) $response->getBody();
        $json = json_decode($body, true);

        // Verifica che la risposta contenga il messaggio di successo
        $this->assertArrayHasKey('success', $json);
        $this->assertEquals('Login successfull!', $json['success']);
    }
    public function testSubmitButtonFailed()
    {
        // Simula l'invio di una richiesta POST a login.php
        $response = $this->client->post('login.php', [
            'form_params' => [
                'username' => 'testuser', 
                'password' => 'testpass', 
            ],
        ]);

        // Verifica che la risposta sia un successo
        $this->assertEquals(200, $response->getStatusCode());

        $body = (string) $response->getBody();
        $json = json_decode($body, true);

        // Verifica che la risposta contenga il messaggio di errore
        $this->assertArrayHasKey('error', $json);
        $this->assertEquals('Questo user non è iscritto, Registrati! Oppure la password è errata.', $json['error']);
    }
}


