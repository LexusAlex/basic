<?php
require(__DIR__ . '/_bootstrap.php');

class LoginFormTest extends \PHPUnit_Framework_TestCase
{

    public function testEmptyForm()
    {
        $m = new app\modules\index\models\LoginForm();
        $m->username = '';
        $m->password = '';
        $this->assertTrue($m->validate() == false, 'Valid model');

    }
    public function testValidUserName(){

        $m = new app\modules\index\models\LoginForm();
        $m->username = 'novalidName';
        $this->assertFalse($m->validate(["username"]), 'username');
    }
    public function testValidPass(){
        $m = new app\modules\index\models\LoginForm();
        $m->username = 'admin';
        $m->password = 'novalid';
        $this->assertFalse($m->validate(["password"]), 'pass');
    }
}
