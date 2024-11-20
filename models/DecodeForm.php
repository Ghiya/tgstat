<?php

namespace app\models;

use app\helpers\ShortUrlHelper;
use yii\base\Model;

/**
 * Class DecodeForm
 *
 * Форма валидации данных для перехода по сокращённой ссылке.
 * @property-read string $urlShortPart
 */
class DecodeForm extends Model
{
    /**
     * @var string короткая ссылка
     */
    public $url;

    /**
     * @var string сокращённая часть ссылки
     */
    private $urlShortPart = "";

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return [
            ['url', 'required'],
            ['url', 'url'],
            ['url', 'validateIfShort', 'skipOnError' => true],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function attributeLabels(): array
    {
        return [
            'url' => 'Ссылка',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function attributeHints(): array
    {
        return [
            'url' => 'Укажите сокращённую ссылку',
        ];
    }

    /**
     * Выполняет валидацию указанной короткой ссылки.
     * @return void
     */
    public function validateIfShort()
    {
        $urlShortPart = $this->getUrlShortPart();
        if (empty($urlShortPart) || !ShortUrlHelper::isValidUrlShortPart($urlShortPart)) {
            $this->addError('url', 'Указанная ссылка не является короткой');
        }
    }

    public function getUrlShortPart(): string
    {
        return ShortUrlHelper::extractShortFromUrl($this->url);
    }
}