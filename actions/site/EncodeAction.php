<?php

namespace app\actions\site;

use app\controllers\SiteController;
use app\models\EncodeForm;
use app\models\UrlModel;
use Yii;
use yii\base\Action;

/**
 * Class EncodeAction
 *
 * Действие обработки данных полной ссылки и формаирования сокращённой.
 * @property-read SiteController $controller
 */
class EncodeAction extends Action
{

    public function runWithParams($params)
    {
        $encodeForm = new EncodeForm();
        if (Yii::$app->request->isPost) {
            if ($encodeForm->load(Yii::$app->request->post()) && $encodeForm->validate()) {
                $urlShortener = $this->controller->urlShortener;
                $model = UrlModel::addShortUrl($encodeForm->url, $urlShortener->generateUrlShortPart($encodeForm->url));

                return $this->controller->render('encode-result', [
                    'shortUrl' => $urlShortener->buildShortUrlWith($model->short),
                ]);
            }
        }

        return $this->controller->render('encode', [
            'model' => $encodeForm,
        ]);
    }
}