<?php

/**
 * whideshot.co.kr PHP API Client.
 *
 * @author  https://github.com/devhun
 * @license https://opensource.org/licenses/mit-license.php MIT
 *
 * @see     https://github.com/devhun/wideshot-api-client
 */

namespace DevHun\Wideshot\Adapter;

use DevHun\Wideshot\Exception\ApiException;

abstract class AbstractAdapter implements AdapterInterface
{
    /**
     * Throw error with explanation of what hapend.
     *
     * @param int    $code
     * @param string $response
     *
     * @throws ApiException
     */
    protected function reportError($code, $response)
    {
        switch ($code) {
            case 200:
                $responseObj = json_decode($response, true);

                if ($responseObj['code'] !== '200') {
                    throw new ApiException(isset($responseObj['message']) ?: '');
                }
                break;
        }
    }
}
