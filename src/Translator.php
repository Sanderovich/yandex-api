<?php

namespace Yandex;

use Yandex\Requests\RequestFactory;

/**
 * Class Translator
 *
 * @package Yandex
 */
class Translator
{
    /**
     * @var RequestFactory
     */
    private $factory;

    /**
     * Translator constructor.
     *
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->factory = new RequestFactory($key);
    }

    /**
     * Get supported languages / translations by Yandex
     *
     * @return mixed
     * @throws Exceptions\YandexException
     */
    public function getSupportedLanguages()
    {
        return $this->factory->get('languages')->send();
    }

    /**
     * Translate text by Yandex
     *
     * @param string $text
     * @param string $language
     * @param string $format
     * @param int $options
     *
     * @return mixed
     * @throws Exceptions\YandexException
     */
    public function translate(string $text, string $language, string $format = 'plain', int $options = 0)
    {
        $request = $this->factory->get('translate');
        $request->setParameters([
            'text'       => $text,
            'lang'       => $language,
            'format'     => $format,
            'options'    => $options
        ]);

        return $request->send();
    }

    /**
     * Detect the language the text is written in
     *
     * @param string $text
     * @param array $hints
     *
     * @return mixed
     * @throws Exceptions\YandexException
     */
    public function detect(string $text, array $hints = [])
    {
        $request = $this->factory->get('detect_language');
        $request->setParameters([
            'text' => $text,
            'hints' => $hints,
        ]);

        return $request->send();
    }
}