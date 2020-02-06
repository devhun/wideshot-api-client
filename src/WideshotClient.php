<?php

/**
 * whideshot.co.kr PHP API Client.
 *
 * @author  https://github.com/devhun
 * @license https://opensource.org/licenses/mit-license.php MIT
 *
 * @see     https://github.com/devhun/wideshot-api-client
 */

namespace DevHun\Wideshot;

use DevHun\Wideshot\Adapter\AdapterInterface;
use DevHun\Wideshot\ApiCall\Kakao;
use DevHun\Wideshot\ApiCall\Message;
use DevHun\Wideshot\ApiCall\Result;

class WideshotClient
{
    const ENDPOINT = 'https://api.wideshot.co.kr/api/v1/';
    const VERSION = '1.0';
    const AGENT = 'whideshot.co.kr PHP API Client';

    /**
     * @var AdapterInterface
     */
    private $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function message()
    {
        return new Message($this->adapter);
    }

    public function kakao()
    {
        return new Kakao($this->adapter);
    }

    public function result()
    {
        return new Result($this->adapter);
    }
}
