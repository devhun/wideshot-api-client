<?php

/**
 * whideshot.co.kr PHP API Client
 *
 * @package DevHun\Wideshot
 * @author  https://github.com/devhun
 * @license https://opensource.org/licenses/mit-license.php MIT
 * @see     https://github.com/devhun/wideshot-api-client
 */

namespace DevHun\Wideshot\Adapter;

interface AdapterInterface
{
    /**
     * Added primarily to allow proper code testing.
     *
     * @param string $endpoint
     */
    public function setEndpoint($endpoint);

    /**
     * GET Method
     *
     * @param string $url  API method to call
     * @param array  $args Argument to pass along with the method call.
     *
     * @return array
     */
    public function get($url, array $args = []);

    /**
     * POST Method
     *
     * @param string $url  API method to call
     * @param array $args  Argument to pass along with the method call.
     * @param array $files File to pass along with the method call.
     *
     * @return array|integer when $getCode is set, the HTTP response code will
     * be returned, otherwise an array of results will be returned.
     */
    public function post($url, array $args, array $files = []);
}