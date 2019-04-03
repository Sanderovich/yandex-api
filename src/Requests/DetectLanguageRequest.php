<?php

namespace Yandex\Requests;

/**
 * Class DetectLanguageRequest
 *
 * @package Yandex\Requests
 */
class DetectLanguageRequest extends Request
{
    /**
     * DetectLanguageRequest constructor.
     *
     * @param string $key
     */
    public function __construct(string $key)
    {
        parent::__construct($key, '/detect');
    }
}