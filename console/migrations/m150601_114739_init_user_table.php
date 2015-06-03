<?php

use yii\db\Schema;
use yii\db\Migration;

class m150601_114739_init_user_table extends Migration
{
    public function up()
    {
        $this->insert('{{%user}}',[
            'username'=>'admin',
            'password_hash'=>'$2y$10$oT8srIGtKoTGIFuUHlf8aey/CcNLIjmNPsF2Ly4CwOB7Qfiix8Z6.',
        ]);
    }

    public function down()
    {
        $this->delete('{{%user}}', ['id' => 1]);
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
