<?php
require(__DIR__ . '/_bootstrap.php');

class UnitAppTest extends \PHPUnit_Framework_TestCase
{
    public function testEmptyForm()
    {
        $m = new app\modules\main\models\ContactForm();
        //$m->text = 'test';
        //$m->textArea = 'text';
        $this->assertTrue($m->validate() == false, 'Valid model');


    }
}
