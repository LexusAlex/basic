<?php
require(__DIR__ . '/_bootstrap.php');


class UserTest
{
    protected function assert($condition, $message = '')
    {
        echo $message . PHP_EOL;
        if ($condition) {
            echo 'OK' . PHP_EOL;
        } else {
            echo 'FAIL' . PHP_EOL;
        }
    }

    public function testEmptyForm()
    {
        $m = new app\modules\main\models\ContactForm();
        //$m->text = 'test';
        //$m->textArea = 'text';
        $this->assert($m->validate() == false, 'Valid model');


    }
}

$n = new UserTest();
$n->testEmptyForm();
