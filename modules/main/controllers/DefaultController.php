<?php

namespace app\modules\main\controllers;


use app\modules\main\models\ContactForm;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\View;

class DefaultController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        /*\Yii::$app->mailer->compose()
            ->setFrom('from@domain.com')
            ->setTo('to@domain.com')
            ->setSubject('Тема сообщения')
            ->setTextBody('Текст сообщения')
            ->setHtmlBody('<b>текст сообщения в формате HTML</b>')
            ->attach(__FILE__)
            ->send();*/

        /*$this->view->registerJs('console.log("HEAD")',View::POS_HEAD);
        $this->view->registerJs('console.log("BEGIN")',View::POS_BEGIN);
        $this->view->registerJs('console.log("END")',View::POS_END);
        $this->view->registerJs('console.log("READY")',View::POS_READY);
        $this->view->registerJs('console.log("LOAD")',View::POS_LOAD);
        $this->view->registerCss('body{background-color:red;}');*/


        $this->view->title = $this->action->uniqueId;
        //var_dump(\Yii::);
        //return $this->render('index');
        //return 'cvcxvxcvcx';
        //return Json::encode(['ereer'=>9]);
        //return $this->render('index');
    }

    public function actionForm()
    {

        /*$f = new ContactForm();
        $f->name = '0';
        $f->email = 'sddsd';
        $f->message = '';
        $f->website ='http://site.ru';
        $f->verificationCode = '123';
        $f->age = 4;

        var_dump($f->attributes); // array
        var_dump($f->toArray(['name','email'])); // array
        var_dump($f->validate());
        var_dump($f->errors);*/

        $model = new ContactForm();

        /*if (\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post())) {
            \Yii::$app->response->format = 'json';
            $clientValue = \Yii::$app->request->post('ContactForm')['text'];
            $users = ['Вася','p'];

            $v = \yii\widgets\ActiveForm::validate($model);
            $s = array_search($clientValue,$users);
            return $v;
        }*/


        // распишем для понимания
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate()) {
                return $this->refresh();
            }
        }
        return $this->render('form', ['model' => $model]);
    }

    public function actionFlex()
    {

        return $this->render('flex/flex');
    }

    public function actionButton()
    {
        return $this->render('button');
    }

    public function actionPhp()
    {
        /* Что определено в скрипте */

        /*
        get_defined_functions()
        get_defined_vars()
        get_defined_constants(true)
        get_declared_classes()
        get_declared_interfaces()
        get_declared_traits()
        get_loaded_extensions()
        get_extension_funcs('core')
        get_included_files() //массив всех включенных файлов
        */

        /* Файлы */

        /*
         file_get_contents('http://ya.ru') // фаил или ресурс в строку

        */

        /* Строки */

        /*
         explode(' ',"кусок1 кусок2 кусок3 кусок4 кусок5 кусок6",-5) // разбить строку в массив по разделителю

        */
        /* autoload */
        //spl_autoload_register(['Yii', 'autoload']) автозагрузчик классов
        /* Классы */
        /*
          class_exist()
          interface_exists()
          trait_exists()
        */
        VarDumper::dump(explode(' ', "кусок1 кусок2 кусок3 кусок4 кусок5 кусок6", -5), 2, true);
    }

    public function actionData()
    {


        /*$db1 = \Yii::$app->db->createCommand('SELECT * FROM test')->queryAll();//Все результаты
        $db2 = \Yii::$app->db->createCommand('SELECT * FROM test')->queryOne();//Первый результат
        $db3 = \Yii::$app->db->createCommand('SELECT * FROM test')->queryColumn();// Первый столбец*/

        /*$db4 = \Yii::$app->db->createCommand('SELECT * FROM test WHERE id=:id')
            ->bindValue(':id', 45)
            ->queryOne();*/

        /*$db5 = \Yii::$app->db->createCommand('SELECT * FROM test WHERE id=:id AND text=:text')
            ->bindValues([':id' => 45,'text'=>'new text'])
            ->queryOne();*/

        /*$id = 2;
        $db6 = \Yii::$app->db->createCommand('SELECT * FROM test WHERE id=:id')
            ->bindParam(':id',$id)
            ->queryOne();*/

        //$db7 = \Yii::$app->db->createCommand()->update('test',['text'=> 'mystr'],'id = 2')->execute();
        /*$db8 = \Yii::$app->db->createCommand()->insert('test',[
                    'id' => 34,
                    'text' => 'newtext 34'])->execute();*/

        //Массовая вставка элементов для этого сгенерируем тестовые данные
        $v = [];
        for ($i = 0; $i < 1000; $i++) {
            $str = 'value ' . $i;
            $v[] = [$i, $str];
        }
        /*$db9 = \Yii::$app->db->createCommand()->batchInsert('test', ['id', 'text'],
            [
                [1, 'text1'],
                [8, 'text8'],
                [16, 'text16'],
            ]
            )->execute();*/
        /*$db10 = \Yii::$app->db->createCommand()->batchInsert('test', ['id', 'text'],
            $v
            )->execute();*/

        // Экранирование  [[]] - столбцы {{}} - таблица
        /*$db11 = \Yii::$app->db->createCommand('SELECT [[id]],[[text]] FROM {{test}}')->queryAll();*/

        //Транзакции Последовательное выполнение запросов
        /*$db12 = \Yii::$app->db->transaction(function($db){
            $db->createCommand('SELECT [[id]],[[text]] FROM {{test}} WHERE [[id]] BETWEEN 5 AND 50')->queryAll();
            $db->createCommand('SELECT [[id]],[[text]] FROM {{test}}')->queryOne();
        });*/

        //Схема дб
        /*$db13 = \Yii::$app->db->getTableSchema('test');
        $db14 = \Yii::$app->db->schema;*/

        VarDumper::dump($db14, 2, true);
        return $this->render('index');
    }

    public function actionUrl($id = null, $version = null)
    {

        //l?id=3&version=545
        //main/default/url/trtr => 'main/default/url/<version:\w+>' => 'main/default/url',
        // Создать url различными способами
        echo Url::to() . '<br>';
        echo Url::to('/new/post/index') . '<br>';
        echo Url::to(['default/url', 'id' => 100, '#' => 'content']) . '<br>';
        echo Url::to(['post/index'], true) . '<br>'; //absolute
        echo Url::to(['post/index'], 'https') . '<br>'; //absolute
        // url Контекстно зависимые
        echo Url::to(['']) . '<br>';// текущий
        echo Url::to(['flex']) . '<br>';
        echo Url::to(['flex/index']) . '<br>';
        echo Url::to(['/flex/index']) . '<br>';
        //alias
        echo Url::to(['@webroot']) . '<br>';
        echo Url::to(['@vendor']) . '<br>';
        echo Url::to(['@bower']) . '<br>';
        echo Url::to(['@app']) . '<br>';
        echo Url::to(['@yii']) . '<br>';
        echo Url::to(['@runtime']) . '<br>';
        // Не связанные
        echo Url::to('/images/logo.gif', true) . '<br>';
        echo Url::home() . '<br>';
        echo Url::base() . '<br>';
        echo Url::canonical() . '<br>';
        // remember
        Url::remember();
        echo Url::previous();

        echo Url::toRoute(['product/view', 'id' => 42]) . '<br>';

    }

    public function actionAjax()
    {

    }

}