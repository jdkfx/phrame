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
}
