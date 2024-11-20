<?php

/** @var yii\web\View $this */

/** @var yii\bootstrap4\ActiveForm $activeForm */

/** @var EncodeForm $model */

use app\models\EncodeForm;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Сократить ссылку';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <div class="row">
        <div class="col-lg-5">

            <?php
            $form = ActiveForm::begin(['id' => 'encode-form']); ?>

            <?= $form->field($model, 'url')->textInput(['autofocus' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Сократить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php
            ActiveForm::end(); ?>

        </div>
    </div>
</div>
