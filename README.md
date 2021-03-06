# PHP API client for api.wideshot.co.kr

[![Build Status](https://travis-ci.org/devhun/wideshot-api-client.svg?branch=master)](https://travis-ci.org/devhun/wideshot-api-client)
[![Latest Stable Version](https://poser.pugx.org/devhun/wideshot-api-client/version)](https://packagist.org/packages/devhun/wideshot-api-client)
[![Total Downloads](https://poser.pugx.org/devhun/wideshot-api-client/downloads)](https://packagist.org/packages/devhun/wideshot-api-client)
[![License](https://poser.pugx.org/devhun/wideshot-api-client/license)](https://packagist.org/packages/devhun/wideshot-api-client)

## Install using composer

Open a shell, `cd` to your poject and type:

```sh
composer require devhun/wideshot-api-client
```

or edit composer.json and add:

```json
{
    "require": {
        "devhun/wideshot-api-client": "~1.0"
    }
}
```

If you want to use the `GuzzleHttpAdapter`, you will need to add [Guzzle 6](https://github.com/guzzle/guzzle).

## Usage examples

###### Guzzle

```php
require 'vendor/autoload.php';

use Wideshot\WideshotClient;
use Wideshot\Adapter\GuzzleHttpAdapter;

// Using Guzzle 6...
$client = new WideshotClient(
    new GuzzleHttpAdapter('your-api-key')
);

$result = $client->result()->all();

var_export($result);
```

###### CURL

```php
require 'vendor/autoload.php';

use Wideshot\WideshotClient;
use Wideshot\Adapter\CurlAdapter;

// Using regular CURL, courtesy of 'malc0mn'
$client = new WideshotClient(
    new CurlAdapter('your-api-key')
);

$result = $client->result()->all();

var_export($result);
```
