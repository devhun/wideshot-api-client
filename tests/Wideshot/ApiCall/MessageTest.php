<?php

namespace DevHun\Wideshot\Tests;

use DevHun\Wideshot\Adapter\CurlAdapter;
use DevHun\Wideshot\Adapter\GuzzleHttpAdapter;
use DevHun\Wideshot\WideshotClient;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
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

    public function testSms()
    {
        $userKey = uniqid();
        $result = $this->client->message()->sms(
            '0212345678',
            'TEST CONTENTS',
            '01012345678',
            $userKey
        );

        $this->assertEquals('200', $result['code']);
        $this->assertArrayHasKey('sendCode', $result);
        $this->assertEquals($userKey, $result['sendCode']);
    }

    public function testSms4ResultSingle()
    {
        $result = $this->client->message()->sms(
            '0212345678',
            'TEST CONTENTS',
            '01012345678',
            'USERKEY-1'
        );

        $this->assertEquals('200', $result['code']);
        $this->assertArrayHasKey('sendCode', $result);
        $this->assertEquals('USERKEY-1', $result['sendCode']);
    }

    public function testLms()
    {
        $userKey = uniqid();
        $result = $this->client->message()->lms(
            '0212345678',
            'TEST CONTENTS',
            '01012345678',
            $userKey,
            'TEST TITLE'
        );

        $this->assertEquals('200', $result['code']);
        $this->assertArrayHasKey('sendCode', $result);
        $this->assertEquals($userKey, $result['sendCode']);
    }

    public function testMms()
    {
        $userKey = uniqid();
        $result = $this->client->message()->mms(
            '0212345678',
            'TEST CONTENTS',
            '01012345678',
            $userKey,
            'TEST TITLE',
            false,
            [
                __DIR__.'/images/1.jpg',
                __DIR__.'/images/2.jpg',
                __DIR__.'/images/3.jpg',
            ]
        );

        $this->assertEquals('200', $result['code']);
        $this->assertArrayHasKey('sendCode', $result);
        $this->assertEquals($userKey, $result['sendCode']);
    }

    public function testIsms()
    {
        $userKey = uniqid();
        $result = $this->client->message()->isms(
            '0212345678',
            'TEST CONTENTS',
            '01012345678',
            $userKey
        );

        $this->assertEquals('200', $result['code']);
        $this->assertArrayHasKey('sendCode', $result);
        $this->assertEquals($userKey, $result['sendCode']);
    }
}
