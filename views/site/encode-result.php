<?php

/** @var yii\web\View $this */

/** @var string $shortUrl */

$this->title = 'Сократить ссылку';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="site-contact">
        <div class="row">
            <div class="col-lg-12">

                <p>Сокращённая ссылка:</p>
                <p><?= $shortUrl ?></p>

            </div>
        </div>
    </div>
<?php
