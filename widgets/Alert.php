<?php
namespace app\widgets;

class Alert extends \yii\base\Widget
{
    public $types = [
        'info'    => 'alert', //blue
        'error'   => 'alert alert-error', //red
        'warning' => 'alert alert-warning', //orange
        'success' => 'alert alert-done', //green
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
        $this->view->registerJs("$('.alert')

                                        function func() {
                                              $('.alert').fadeOut( 3000 );
                                              //$('.alert').hide(3000);
                                            }
                                    setTimeout(func,5000);
                              ");

    }
}
