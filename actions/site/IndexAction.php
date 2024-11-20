<?php

namespace app\actions\site;

use yii\base\Action;

class IndexAction extends Action
{


    public function runWithParams($params)
    {
        return $this->controller->render('index');
    }
}