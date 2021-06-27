<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class ApiTest extends TestCase
{
    private $http;

    public function setUp() : void
    {
        $this->http = new Client(['base_uri' => 'http://localhost']);
    }

    public function tearDown() : void {
        $this->http = null;
    }

    public function testGet()
    {
        $response = $this->http->request('GET', '/api/devices');

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json", $contentType);
    }

    public function testPost()
    {
        $response = $this->http->request('POST', '/api/devices', ['form_params' => ['device_id' => 100, 'device_type' => 'test', 'damage_possible' => 1]]);

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json", $contentType);
    }

    public function testPut()
    {
        $response = $this->http->request('PUT', '/api/devices/100', ['form_params' => ['device_type' => 'testt', 'damage_possible' => 1]]);

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json", $contentType);
    }

    public function testDelete()
    {
        $response = $this->http->request('DELETE', '/api/devices/100');

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json", $contentType);
    }
}