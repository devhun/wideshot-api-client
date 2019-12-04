<?php


namespace Wideshot\Tests;

use PHPUnit\Framework\TestCase;
use Wideshot\Adapter\CurlAdapter;

class CurlAdapterTest extends TestCase
{
    /**
     * @var CurlAdapter
     */
    protected $client;

    protected function setUp() : void
    {
        $this->client = new CurlAdapter('EXAMPLE');
    }

    public function testConstruct()
    {
        $this->assertInstanceOf('Wideshot\\Adapter\\CurlAdapter', $this->client);
    }
}