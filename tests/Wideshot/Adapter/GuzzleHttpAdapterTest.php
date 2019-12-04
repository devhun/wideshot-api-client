<?php

namespace Wideshot\Tests;

use PHPUnit\Framework\TestCase;
use Wideshot\Adapter\GuzzleHttpAdapter;

class GuzzleHttpAdapterTest extends TestCase
{
    /**
     * @var GuzzleHttpAdapter
     */
    protected $client;

    protected function setUp() : void
    {
        $this->client = new GuzzleHttpAdapter('EXAMPLE');
    }

    public function testConstruct()
    {
        $this->assertInstanceOf('Wideshot\\Adapter\\GuzzleHttpAdapter', $this->client);
    }
}