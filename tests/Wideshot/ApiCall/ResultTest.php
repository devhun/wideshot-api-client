<?php

namespace Wideshot\Tests;

use PHPUnit\Framework\TestCase;
use Wideshot\WideshotClient;

class ResultTest extends TestCase
{
    /**
     * @var WideshotClient
     */
    protected $client;

    protected function setUp(): void
    {
        $adapterClass = 'Wideshot\\Adapter\\' . getenv('ADAPTER');

        $adapter = new $adapterClass(getenv('APITOKEN'));
        $adapter->setEndpoint(getenv('ENDPOINT'));

        $this->client = new WideshotClient($adapter);
    }

    public function testSingle()
    {
        $result = $this->client->result()->single('USERKEY-1');

        $this->assertArrayHasKey('data', $result);
        $this->assertCount(1, $result['data']);
        $this->assertEquals('200', $result['code']);
    }

    public function testAll()
    {
        $result = $this->client->result()->all();

        $this->assertArrayHasKey('data', $result);
        $this->assertCount(7, $result['data']);
        $this->assertEquals('200', $result['code']);
    }
}