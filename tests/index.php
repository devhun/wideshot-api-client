<?php

/**
 * whideshot.co.kr PHP API Client
 *
 * Dummy API endpoint to allow actual adapter tests but with dummy data.
 *
 * @package Wideshot
 * @version 1.0
 * @author  https://github.com/devhun
 * @license https://opensource.org/licenses/mit-license.php MIT
 * @see     https://github.com/devhun/wideshot-api-client
 */

require_once 'DummyData.php';

// Out fake 'content store'
$jsonData = new \Wideshot\Tests\DummyData();

// Grab requested url.
$url = ltrim($_SERVER['PATH_INFO'], '/');

// Prepare arguments.
$args = array_merge($_GET, $_POST);

// Return fake data.
header('Content-Type: application/json');
print(
    $jsonData->getResponse($url, $args)
);