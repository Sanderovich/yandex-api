<?php

namespace Yandex\Requests;

use Yandex\Exceptions\YandexException;

/**
 * Class RequestFactory
 *
 * @package Yandex\Requests
 */
class RequestFactory
{
    /**
     * List of requests
     *
     * @var array
     */
    private $requests = [];

    /**
     * RequestFactory constructor.
     *
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->requests = [
            'languages'         => new SupportedLanguagesRequest($key),
            'detect_language'   => new DetectLanguageRequest($key),
            'translate'         => new TranslateRequest($key),
        ];
    }

    /**
     * Get Yandex request
     *
     * @param string $request
     * @return mixed
     * @throws YandexException
     */
    public function get(string $request)
    {
       if (array_key_exists($request, $this->requests)) {
           return $this->requests[$request];
       }

       throw new YandexException("Request '$request' doesn't exist");
    }
}
