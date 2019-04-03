<?php

namespace Yandex\Requests;

use GuzzleHttp\Client;

/**
 * Class Request
 *
 * @package Yandex\Requests
 */
abstract class Request
{
    /**
     * The parameters required for the request
     *
     * @var array
     */
    protected $parameters;

    /**
     * The HTTP method required for the request
     *
     * @var string
     */
    private $method;

    /**
     * The url to the API request
     *
     * @var string
     */
    private $path;

    /**
     * The base URL for all API requests
     */
    private const URL = "https://translate.yandex.net/api/v1.5/tr.json";

    /**
     * The Yandex API key
     *
     * @var string
     */
    private $key = "";

    /**
     * @var GuzzleHttp\Client
     */
    private $client;

    /**
     * Request constructor.
     *
     * @param string $key
     * @param string $path
     * @param array $parameters
     * @param string $method
     */
    public function __construct(string $key, string $path = '/', array $parameters = [], string $method = 'GET')
    {
        $this->key = $key;
        $this->path = $path;
        $this->parameters = $parameters;
        $this->method = $method;

        $this->client = new Client([
            'verify' => __DIR__ . '/../../cacert.pem',
            'base_uri' => self::URL
        ]);
    }

    /**
     * Send API request to Yandex
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send()
    {
        $options = [
            'query' => [
                'key' => $this->key,
            ],
        ];

        foreach ($this->parameters as $parameter => $value) {
            $options['query'][$parameter] = $value;
        }

        $response  = $this->client->request($this->method, self::URL . $this->path, $options);

        return json_decode($response->getBody());
    }

    /**
     * Set parameters for the request
     *
     * @param array $parameters
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
    }
}