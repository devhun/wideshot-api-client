<?php

namespace Wideshot\Tests;

use PHPUnit\Framework\TestCase;
use Wideshot\WideshotClient;

class WideshotClientTest extends TestCase
{
    public function testConstruct()
    {
        $adapterClass = 'WideShot\\Adapter\\' . getenv('ADAPTER');

        $adapter = new $adapterClass(getenv('APITOKEN'));
        $adapter->setEndpoint(getenv('ENDPOINT'));

        $client = new WideshotClient($adapter);

        $this->assertInstanceOf('Wideshot\\WideshotClient', $client);
    }
}