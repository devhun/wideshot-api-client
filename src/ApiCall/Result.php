<?php

/**
 * whideshot.co.kr PHP API Client
 *
 * @package Wideshot
 * @version 1.0
 * @author  https://github.com/devhun
 * @license https://opensource.org/licenses/mit-license.php MIT
 * @see     https://github.com/devhun/wideshot-api-client
 */

namespace Wideshot\ApiCall;

class Result extends AbstractApiCall
{
    public function all()
    {
        return $this->adapter->get('message/results');
    }

    public function single($sendCode)
    {
        $args = [
            'sendCode' => $sendCode
        ];

        return $this->adapter->get('message/result', $args);
    }
}