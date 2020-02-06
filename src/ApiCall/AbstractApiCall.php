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

use DevHun\Wideshot\Adapter\AdapterInterface;

abstract class AbstractApiCall
{
    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
}
