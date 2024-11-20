<?php

/** @var yii\web\View $this */

/** @var yii\bootstrap4\ActiveForm $form */

/** @var app\models\DecodeForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

// https://short-url.tgstat.com/e98192e19505472476a49f10388428ab
$this->title = 'Перейти по короткой ссылке';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <div class="row">
        <div class="col-lg-5">

            <?php
            $form = ActiveForm::begin(['id' => 'decode-form']); ?>

            <?= $form->field($model, 'url')->textInput(['autofocus' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Перейти', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php
            ActiveForm::end(); ?>

        </div>
    </div>
</div>
