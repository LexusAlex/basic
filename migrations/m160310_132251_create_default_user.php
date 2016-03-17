<?php

use yii\db\Migration;
class m160310_132251_create_default_user extends Migration
{
    public function up()
    {
        $this->insert('{{user}}', [
            'username' => \Yii::$app->params["user"],
            'password_hash' => \Yii::$app->security->generatePasswordHash(\Yii::$app->params['password']),
            'password_reset_token' => \Yii::$app->security->generateRandomString() . '_' . time(),
            'email' => 'admin@localhost.local',
            'auth_key' => \Yii::$app->security->generateRandomString(),
            'status' => '10',
            'created_at' => time(),
            'updated_at' => time()
        ]);
    }

    public function down()
    {
        $u = \Yii::$app->params['user'];
        $this->delete('{{user}}', "username = '$u'");
    }
}
