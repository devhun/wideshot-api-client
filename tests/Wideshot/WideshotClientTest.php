<?php

namespace DevHun\Wideshot\Tests;

use DevHun\Wideshot\Adapter\CurlAdapter;
use DevHun\Wideshot\Adapter\GuzzleHttpAdapter;
use DevHun\Wideshot\WideshotClient;
use PHPUnit\Framework\TestCase;

class WideshotClientTest extends TestCase
{
    public function testConstruct()
    {
        $adapterClass = 'DevHun\\WideShot\\Adapter\\'.getenv('ADAPTER');

        /**
         * @var CurlAdapter|GuzzleHttpAdapter
         */
        $adapter = new $adapterClass(getenv('APITOKEN'));
        $adapter->setEndpoint(getenv('ENDPOINT'));

        $client = new WideshotClient($adapter);

        $this->assertInstanceOf('DevHun\\Wideshot\\WideshotClient', $client);
    }
}
