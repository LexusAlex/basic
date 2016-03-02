<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

//\yii\helpers\VarDumper::dump(get_declared_classes(),2,true);
$this->registerJs("
    function show1(){
            var r = new XMLHttpRequest();
            r.open(\"GET\",'index.php?r=site/ajax&name=alex',true);

            //r.open(\"GET\",window.location.href,true);
            //r.setRequestHeader('Content-Type', 'text/xml');
            r.send(null);
            r.onreadystatechange = function() {

                if (r.readyState === 4){
                //console.log(r.getAllResponseHeaders());
                    var id = document.getElementById('text');
                    id.textContent = r.responseText;
                    //document.body.childNodes[1].innerHTML='Загрузка..';
                    //document.body.childNodes[1].innerHTML='Получено';
                    //document.body.childNodes[1].disabled = true;
                }
            }
        }
", \yii\web\View::POS_END);
//$this->registerJsFile('@app/web/js/test.js',['position' => yii\web\View::POS_END]);
?>

<button onclick="show1()">Получить текст</button>
<div id="text"></div>