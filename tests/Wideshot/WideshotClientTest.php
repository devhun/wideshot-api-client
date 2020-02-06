<?php

namespace DevHun\Wideshot\Tests;

use DevHun\Wideshot\Adapter\CurlAdapter;
use DevHun\Wideshot\Adapter\GuzzleHttpAdapter;
use PHPUnit\Framework\TestCase;
use DevHun\Wideshot\WideshotClient;

class WideshotClientTest extends TestCase
{
    public function testConstruct()
    {
        $adapterClass = 'DevHun\\WideShot\\Adapter\\' . getenv('ADAPTER');

        /**
         * @var $adapter CurlAdapter|GuzzleHttpAdapter
         */
        $adapter = new $adapterClass(getenv('APITOKEN'));
        $adapter->setEndpoint(getenv('ENDPOINT'));

        $client = new WideshotClient($adapter);

        $this->assertInstanceOf('DevHun\\Wideshot\\WideshotClient', $client);
    }
}