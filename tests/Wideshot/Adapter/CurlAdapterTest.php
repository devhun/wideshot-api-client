<?php

namespace DevHun\Wideshot\Tests;

use DevHun\Wideshot\Adapter\CurlAdapter;
use PHPUnit\Framework\TestCase;

class CurlAdapterTest extends TestCase
{
    /**
     * @var CurlAdapter
     */
    protected $client;

    protected function setUp(): void
    {
        $this->client = new CurlAdapter('EXAMPLE');
    }

    public function testConstruct()
    {
        $this->assertInstanceOf('DevHun\\Wideshot\\Adapter\\CurlAdapter', $this->client);
    }
}
