<?php

declare(strict_types=1);

namespace App\Tests;

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class getStatusTest extends TestCase
{
    /**
     * @return void
     * @throws GuzzleException
     */
    public function testGetTop()
    {
        $client = new Client();

        $response = $client->get('http://localhost/');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetBlog()
    {
        $client = new Client();

        $response = $client->get('http://localhost/blog');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetCreate()
    {
        $client = new Client();

        $response = $client->get('http://localhost/blog/create');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testPostConfirm()
    {
        $client = new Client();

        $response = $client->post('http://localhost/blog/create/confirm', [
            'title' => 'test',
            'messages' => 'phpunit-test'
        ]);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testPostStore()
    {
        $client = new Client();

        $response = $client->post('http://localhost/blog/store', [
            'title' => 'test',
            'messages' => 'phpunit-test'
        ]);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGet404()
    {
        $client = new Client();

        $response = $client->get('http://localhost/hoge', ['http_errors' => false]);

        $this->assertEquals(404, $response->getStatusCode());
    }
}
