<?php

namespace DevHun\Wideshot\Tests;

use DevHun\Wideshot\Adapter\CurlAdapter;
use DevHun\Wideshot\Adapter\GuzzleHttpAdapter;
use DevHun\Wideshot\WideshotClient;
use PHPUnit\Framework\TestCase;

class ResultTest extends TestCase
{
    /**
     * @var WideshotClient
     */
    protected $client;

    protected function setUp(): void
    {
        $adapterClass = 'DevHun\\Wideshot\\Adapter\\'.getenv('ADAPTER');

        /**
         * @var CurlAdapter|GuzzleHttpAdapter
         */
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
