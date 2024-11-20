<?php

use yii\helpers\ArrayHelper;

$dbLocal = require __DIR__.'/db-local.php';

return ArrayHelper::merge([
    'class' => 'yii\db\Connection',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
], $dbLocal);
