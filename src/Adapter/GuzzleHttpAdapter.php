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

namespace Wideshot\Adapter;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use Wideshot\WideshotClient;

class GuzzleHttpAdapter extends AbstractAdapter
{
    /**
     * API Token
     *
     * @see https://www.wideshot.co.kr/mypage/senderList.do
     *
     * @var string $apiToken Wideshot API token
     */
    protected $apiToken;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @param string $apiToken Wideshot API token
     */
    public function __construct($apiToken)
    {
        $this->apiToken = $apiToken;
        $this->client = $this->buildClient();
    }

    /**
     * Helper function to build the Guzzle HTTP client.
     *
     * @param string $endpoint API endpoint
     *
     * @return Client
     */
    protected function buildClient($endpoint = null)
    {
        if ($endpoint === null) {
            $endpoint = WideshotClient::ENDPOINT;
        }

        $config = [
            'base_uri' => $endpoint,
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => sprintf('%s v%s (%s)',WideshotClient::AGENT,WideshotClient::VERSION, 'https://github.com/devhun/wideshot-api-client'),
                'sejongApiKey' => $this->apiToken
            ]
        ];

        return new Client($config);
    }

    /**
     * {@inheritDoc}
     */
    public function setEndpoint($endpoint)
    {
        $this->client = $this->buildClient($endpoint);
    }

    /**
     * {@inheritDoc}
     */
    public function get($url, array $args = [])
    {
        $options = [];

        // Add additional arguments to the defaults:
        if (!empty($args)) {
            $options['query'] = $args;
        }

        try {
            $this->response = $this->client->get($url, $options);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();
            return $this->handleError();
        }

        return json_decode($this->response->getBody(), true);
    }

    /**
     * {@inheritDoc}
     */
    public function post($url, array $args, array $files = [])
    {
        if (is_array($files) && !empty($files)) {
            $postData = [];
            foreach ($args as $key => $val) {
                array_push($postData, [
                    'name' => $key,
                    'contents' => $val
                ]);
            }
            $postMode = 'multipart';

            foreach ($files as $key => $val) {
                array_push($postData, [
                    'name' => $key,
                    'contents' => fopen($val, 'r'),
                    'filename' => basename($val)
                ]);
            }
        } else {
            $postData = $args;
            $postMode = 'form_params';
        }
        $options[$postMode] = $postData;

        try {
            $this->response = $this->client->post($url, $options);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();
            $this->handleError();
        }

        return json_decode($this->response->getBody(), true);
    }

    protected function handleError()
    {
        $code = (int) $this->response->getStatusCode();
        $response = (string) $this->response->getBody();

        $this->reportError($code, $response);
    }
}