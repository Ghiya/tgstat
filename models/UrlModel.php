<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Class UrlModel
 *
 * Модель данных ссылок
 *
 * @property int $id идентификатор записи
 * @property string $original оригинальное значение ссылки
 * @property string $short сокращённая часть ссылки
 * @property int $created_at временная метка добавления записи
 */
class UrlModel extends ActiveRecord
{

    /**
     * {@inheritDoc}
     */
    public static function tableName(): string
    {
        return 'urls';
    }

    /**
     * {@inheritDoc}
     */
    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function scenarios(): array
    {
        return [
            self::SCENARIO_DEFAULT => ['original', 'short'],
        ];
    }

    /**
     * Возвращает запись для указанной сокращённой части ссылки.
     * @param string $shortUrlPart
     * @return UrlModel|null
     */
    public static function findByShort(string $shortUrlPart): ?UrlModel
    {
        return static::findOne(['short' => $shortUrlPart]);
    }

    public static function addShortUrl(string $original, $short) {
        $model = new static();
        $model->original = $original;
        $model->short = $short;
        $model->save(false);
        return $model;
    }
}