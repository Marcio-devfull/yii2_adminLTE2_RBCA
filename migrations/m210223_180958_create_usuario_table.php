<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%usuario}}`.
 */
class m210223_180958_create_usuario_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%usuario}}', [
            'id' => $this->primaryKey(),    
            'nome' => $this->string(155)->notNull(),
            'email' => $this->string(120)->notNull(),
            'senha' => $this->string(120)->notNull(),
            'acess_token' => $this->string(120)->notNull(),
            'auth_key' => $this->string(120)->notNull(),
            'status' => $this->boolean()->defaultValue(true),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp()->defaultValue(date('Y-m-d H:i:s')),
        ]);

        $this->insert( 'usuario', [
            'nome' => "Super admin",
            'email' => "super@admin.com",
            'senha' => Yii::$app->security->generatePasswordHash('admin'),
            'acess_token' => Yii::$app->security->generateRandomString(),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $this->insert( 'usuario', [
            'nome' => "Administrador",
            'email' => "admin@admin.com",
            'senha' => Yii::$app->security->generatePasswordHash('admin'),
            'acess_token' => Yii::$app->security->generateRandomString(),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $this->insert( 'usuario', [
            'nome' => "Usuário",
            'email' => "usuario@admin.com",
            'senha' => Yii::$app->security->generatePasswordHash('admin'),
            'acess_token' => Yii::$app->security->generateRandomString(),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%usuario}}');
    }
}
