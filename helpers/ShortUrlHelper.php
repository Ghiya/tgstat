<?php

namespace app\helpers;

/**
 * Class ShortUrlHelper
 *
 * Хелпер предоставляющий методы для коротких ссылок.
 */
class ShortUrlHelper
{
    /**
     * Возвращает сокращённую часть короткой ссылки.
     * @param string $url короткая ссылка
     * @return string
     */
    public static function extractShortFromUrl(string $url): string
    {
        [$shortUrlPart] = array_reverse(explode("/", $url));

        return (string)$shortUrlPart ?? "";
    }

    /**
     * Возвращает признак валидности указанной сокращённой части ссылки.
     * @param string $urlShortPart
     * @return bool
     */
    public static function isValidUrlShortPart(string $urlShortPart): bool
    {
        return preg_match("/^[A-Za-z0-9_-]{5}$/", $urlShortPart);
    }
}