<?php

namespace app\controllers;

use app\actions\site\DecodeAction;
use app\actions\site\EncodeAction;
use app\actions\site\IndexAction;
use app\components\UrlShortener;
use yii\base\InvalidConfigException;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Class SiteController
 * @property-read UrlShortener $urlShortener
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'encode' => ['get', 'post'],
                    'decode' => ['get', 'post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions(): array
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'index' => [
                'class' => IndexAction::class,
            ],
            'encode' => [
                'class' => EncodeAction::class,
            ],
            'decode' => [
                'class' => DecodeAction::class,
            ]
        ];
    }

    /**
     * Возвращает компонент для сокращения ссылок.
     * @return UrlShortener
     * @throws InvalidConfigException
     */
    public function getUrlShortener(): UrlShortener
    {
        return $this->module->get('urlShortener');
    }
}
