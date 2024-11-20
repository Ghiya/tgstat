<?php

namespace app\actions\site;

use app\controllers\SiteController;
use app\models\DecodeForm;
use app\models\UrlModel;
use Yii;
use yii\base\Action;
use yii\base\InvalidRouteException;
use yii\web\NotFoundHttpException;

/**
 * Class DecodeAction
 *
 * Действие обработки данных сокращённой ссылки и перенаправления на оригинальный адрес.
 * @property-read SiteController $controller
 */
class DecodeAction extends Action
{

    /**
     * {@inheritDoc}
     * @throws NotFoundHttpException
     * @throws InvalidRouteException
     */
    public function runWithParams($params)
    {
        $decodeForm = new DecodeForm();
        if (Yii::$app->request->isPost) {
            if ($decodeForm->load(Yii::$app->getRequest()->post()) && $decodeForm->validate()) {
                $model = UrlModel::findByShort($decodeForm->urlShortPart);
                if (empty($model)) {
                    throw new NotFoundHttpException("Короткая ссылка ещё не создавалась");
                }

                return Yii::$app->response->redirect($model->original);
            }
        }

        return $this->controller->render('decode', [
            'model' => $decodeForm,
        ]);
    }
}