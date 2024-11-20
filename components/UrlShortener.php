<?php

namespace app\components;

use yii\base\BaseObject;

/**
 * Class UrlShortener
 *
 * Компонент генерации коротких ссылок.
 */
class UrlShortener extends BaseObject
{

    /**
     * @var string хост используемый для коротких ссылок
     */
    public $shortUrlHost = "";

    /**
     * Формирует сокращённую часть для указанной ссылки
     * и возвращает результат.
     * @param string $url ссылка
     * @return string
     */
    public function generateUrlShortPart(string $url): string
    {
        $allowedSymbols = md5(time()) . "_-";

        return substr(str_shuffle($allowedSymbols), 0, 5);
    }

    /**
     * Формирует и возвращает кортокую ссылку относительно указанной сокращённой части.
     * @param string $urlShortPart
     * @return string
     */
    public function buildShortUrlWith(string $urlShortPart): string
    {
        return "$this->shortUrlHost/$urlShortPart";
    }
}