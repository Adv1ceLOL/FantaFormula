<?php
class ApiFetcher {
    public function fetch($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            throw new Exception('cURL error: ' . curl_error($ch));
        } else {
            if ($status >= 200 && $status < 300) {
                return json_decode($response, true);
            } else {
                throw new Exception("HTTP status code: $status");
            }
        }
    }
}

use PHPUnit\Framework\TestCase;

class ApiFetcherTest extends TestCase {
    public function testFetch() {
        $fetcher = new ApiFetcher();
        $data = $fetcher->fetch("https://api.openf1.org/v1/position?session_key=latest");

        $this->assertIsArray($data);
        $this->assertArrayHasKey('position', $data);
        // Add more assertions as needed
    }
}

class MyTest extends TestCase
{
    public function testAddition()
    {
        $this->assertEquals(2, 1 + 1);
    }
}