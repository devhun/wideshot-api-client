<?php

namespace DevHun\Wideshot\Tests;

use DevHun\Wideshot\Adapter\CurlAdapter;
use DevHun\Wideshot\Adapter\GuzzleHttpAdapter;
use PHPUnit\Framework\TestCase;
use DevHun\Wideshot\WideshotClient;

class KakaoTest extends TestCase
{
    /**
     * @var WideshotClient
     */
    protected $client;

    protected function setUp(): void
    {
        $adapterClass = 'DevHun\\Wideshot\\Adapter\\' . getenv('ADAPTER');

        /**
         * @var $adapter CurlAdapter|GuzzleHttpAdapter
         */
        $adapter = new $adapterClass(getenv('APITOKEN'));
        $adapter->setEndpoint(getenv('ENDPOINT'));

        $this->client = new WideshotClient($adapter);
    }

    public function testAlimtalk()
    {
        $userKey = uniqid();
        $attachment = [
            'attachment' => [
                'button' => [
                    [
                        'name' => 'BUTTON1',
                        'type' => 'WL',
                        'url_pc' => 'http://localhost/',
                        'url_mobile' => 'http://localhost/'
                    ],
                    [
                        'name' => 'BUTTON2',
                        'type' => 'AL',
                        'scheme_android' => 'android://',
                        'scheme_ios' => 'ios://',
                        'url_mobile' => 'http://localhost/',
                        'url_pc' => 'http://localhost'
                    ],
                    [
                        'name' => 'BUTTON3',
                        'type' => 'BK'
                    ],
                    [
                        'name' => 'BUTTON4',
                        'type' => 'MD'
                    ],
                    [
                        'name' => 'BUTTON5',
                        'type' => 'DS'
                    ]
                ]
            ]
        ];
        $result = $this->client->kakao()->alimtalk(
            '@TEST-CHANNEL',
            'SENDER-KEY',
            'TEMPLATE-CODE-001',
            'TEST CONTENTS',
            '01012345678',
            $userKey,
            'TEST TITLE',
            json_encode($attachment, JSON_UNESCAPED_UNICODE)
        );

        $this->assertEquals('200', $result['code']);
        $this->assertArrayHasKey('sendCode', $result);
        $this->assertEquals($userKey, $result['sendCode']);
    }

    public function testFriendtalkInImage()
    {
        $userKey = uniqid();
        $attachment = [
            'attachment' => [
                'button' => [
                    [
                        'name' => 'BUTTON1',
                        'type' => 'WL',
                        'url_pc' => 'http://localhost/',
                        'url_mobile' => 'http://localhost/'
                    ],
                    [
                        'name' => 'BUTTON2',
                        'type' => 'AL',
                        'scheme_android' => 'android://',
                        'scheme_ios' => 'ios://',
                        'url_mobile' => 'http://localhost/',
                        'url_pc' => 'http://localhost/'
                    ],
                    [
                        'name' => 'BUTTON3',
                        'type' => 'BK'
                    ],
                    [
                        'name' => 'BUTTON4',
                        'type' => 'MD'
                    ],
                    [
                        'name' => 'BUTTON5',
                        'type' => 'DS'
                    ]
                ],
                'image' => [
                    'img_url' => '%s',
                    'img_link' => 'http://localhost/'
                ]
            ]
        ];
        $result = $this->client->kakao()->friendtalk(
            '@TEST-CHANNEL',
            'SENDER-KEY',
            'TEST CONTENTS',
            '01012345678',
            $userKey,
            'TEST TITLE',
            false,
            './images/1.jpg',
            json_encode($attachment, JSON_UNESCAPED_UNICODE)
        );

        $this->assertEquals('200', $result['code']);
        $this->assertArrayHasKey('sendCode', $result);
        $this->assertEquals($userKey, $result['sendCode']);
    }

    public function testFriendtalkWebImage()
    {
        $userKey = uniqid();
        $attachment = [
            'attachment' => [
                'button' => [
                    [
                        'name' => 'BUTTON1',
                        'type' => 'WL',
                        'url_pc' => 'http://localhost/',
                        'url_mobile' => 'http://localhost/'
                    ],
                    [
                        'name' => 'BUTTON2',
                        'type' => 'AL',
                        'scheme_android' => 'android://',
                        'scheme_ios' => 'ios://',
                        'url_mobile' => 'http://localhost/',
                        'url_pc' => 'http://localhost/'
                    ],
                    [
                        'name' => 'BUTTON3',
                        'type' => 'BK'
                    ],
                    [
                        'name' => 'BUTTON4',
                        'type' => 'MD'
                    ],
                    [
                        'name' => 'BUTTON5',
                        'type' => 'DS'
                    ]
                ],
                'image' => [
                    'img_url' => 'http://localhost/1.jpg',
                    'img_link' => 'http://localhost/'
                ]
            ]
        ];
        $result = $this->client->kakao()->friendtalk(
            '@TEST-CHANNEL',
            'SENDER-KEY',
            'TEST CONTENTS',
            '01012345678',
            $userKey,
            'TEST TITLE',
            false,
            '',
            json_encode($attachment, JSON_UNESCAPED_UNICODE)
        );

        $this->assertEquals('200', $result['code']);
        $this->assertArrayHasKey('sendCode', $result);
        $this->assertEquals($userKey, $result['sendCode']);
    }
}