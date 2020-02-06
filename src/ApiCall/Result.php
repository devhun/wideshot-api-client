<?php

/**
 * whideshot.co.kr PHP API Client.
 *
 * @author  https://github.com/devhun
 * @license https://opensource.org/licenses/mit-license.php MIT
 *
 * @see     https://github.com/devhun/wideshot-api-client
 */

namespace DevHun\Wideshot\ApiCall;

class Result extends AbstractApiCall
{
    public function all()
    {
        return $this->adapter->get('message/results');
    }

    public function single($sendCode)
    {
        $args = [
            'sendCode' => $sendCode,
        ];

        return $this->adapter->get('message/result', $args);
    }
}
