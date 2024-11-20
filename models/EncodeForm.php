<?php

namespace app\models;

use yii\base\Model;

/**
 * Class EncodeForm
 *
 * Форма валидации данных для сокращения ссылки.
 */
class EncodeForm extends Model
{
    /**
     * @var string ссылка для сокращения
     */
    public $url;


    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return [
            ['url', 'required'],
            ['url', 'url'],
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
            'url' => 'Укажите ссылку для сокращения',
        ];
    }
}