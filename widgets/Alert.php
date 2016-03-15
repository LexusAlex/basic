<?php
namespace app\widgets;

class Alert extends \yii\base\Widget
{
    public $types = [
        'info'    => 'a alert', //blue
        'error'   => 'a alert alert-error', //red
        'warning' => 'a alert alert-warning', //orange
        'success' => 'a alert alert-done', //green
    ];
    //public $view;

    public function init(){
        parent::init();

        $session = \Yii::$app->session;
        $flashes = $session->getAllFlashes();

        foreach($flashes as $type=>$data){
            if (isset($this->types[$type])) {
                $data = (array) $data;
                foreach ($data as $i => $message) {
                    $c = $this->types[$type];
                    echo "<div class='$c'>$message</div>";
                }
                $session->removeFlash($type);
            }
        }
        $this->view->registerJs("$('.a.alert')

                                        function func() {
                                              $('.a.alert').fadeOut( 3000 );
                                              //$('.a.alert').hide(3000);
                                            }
                                    setTimeout(func,5000);
                              ");

    }
}
