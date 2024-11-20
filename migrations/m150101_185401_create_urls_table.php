<?php

use yii\db\Migration;

/**
 * Обрабатывает создание таблицы `urls`.
 */
class m150811_220037_create_urls_table extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('urls', [
            'id' => $this->primaryKey(),
            'original' => $this->string(1024)->notNull(),
            'short' => $this->string(64)->notNull(),
            'created_at' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('urls');
    }
}
