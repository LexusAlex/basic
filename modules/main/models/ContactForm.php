<?php

namespace app\modules\main\models;

use yii\base\Model;

/**
 * Class ContactForm
 * @package app\modules\main\models
 */
class ContactForm extends Model
{

    public $text;
    public $textArea;


    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['text', 'textArea'], 'required'], // обязательное поле
            [['text'], 'string', 'min' => 3, 'max' => 10],
            ['text', 'validateText'],
            //[['age'],'number','min'=>4,'max'=>7],
            //['email','email'],
            //[ ['name'],'boolean','strict'=>true],
            //['website', 'url', 'defaultScheme' => 'http'],
            //['verificationCode', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'text' => 'Your name',
        ];
    }

    /**
     * Валидатор поддерживается только на строне сервера
     * @param $a
     */
    public function validateText($a)
    {
        $valid = 'test';
        if ($this->text !== $valid) {
            $errorMsg = 'Такой пользователь существует выберете другое имя';
            $this->addError($a, $errorMsg);
        }

        /*if(strlen($this->password)<=8) {
            $errorMsg= 'Password must be at least 8 symbols length';
            $this->addError('password',$errorMsg);
        }*/
    }


}