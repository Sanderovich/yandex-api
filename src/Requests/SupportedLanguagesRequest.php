<?php

namespace Yandex\Requests;

/**
 * Class SupportedLanguagesRequest
 *
 * @package Yandex\Requests
 */
class SupportedLanguagesRequest extends Request
{
    /**
     * SupportedLanguagesRequest constructor.
     *
     * @param string $key
     */
    public function __construct(string $key)
    {
        parent::__construct($key, '/getLangs');
    }
}