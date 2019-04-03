<?php

namespace Yandex\Requests;

/**
 * Class TranslateRequest
 *
 * @package Yandex\Requests
 */
class TranslateRequest extends Request
{
    /**
     * TranslateRequest constructor.
     *
     * @param string $key
     */
    public function __construct(string $key)
    {
        parent::__construct($key, '/translate');
    }
}