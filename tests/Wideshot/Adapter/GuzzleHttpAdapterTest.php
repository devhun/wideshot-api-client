<?php

namespace DevHun\Wideshot\Tests;

use DevHun\Wideshot\Adapter\GuzzleHttpAdapter;
use PHPUnit\Framework\TestCase;

class GuzzleHttpAdapterTest extends TestCase
{
    /**
     * @var GuzzleHttpAdapter
     */
    protected $client;

    protected function setUp(): void
    {
        $this->client = new GuzzleHttpAdapter('EXAMPLE');
    }

    public function testConstruct()
    {
        $this->assertInstanceOf('DevHun\\Wideshot\\Adapter\\GuzzleHttpAdapter', $this->client);
    }
}
