<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\index\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{update} {delete} {view}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => 'Update',
                            'aria-label' => 'Update',
                            'data-pjax' => '0',
                            'class' => 'button button-primary button-small',
                        ]);
                        return \yii\helpers\Html::a('update', $url, $options);
                    },
                    'delete' => function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => 'Delete',
                            'aria-label' => 'Delete',
                            'data-confirm' => 'Are you sure you want to delete this item?',
                            'data-method' => 'post',
                            'data-pjax' => '0',
                            'class' => 'button button-primary button-small',
                        ]);
                        return \yii\helpers\Html::a('delete', $url, $options);
                    },
                    'view' => function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => 'View',
                            'aria-label' => 'View',
                            'data-method' => 'post',
                            'data-pjax' => '0',
                            'class' => 'button button-primary button-small',
                            'target' => "_blank",
                        ]);
                        $u = \yii\helpers\Url::to(['/index/default/category', 'id' => $model->id]);
                        return \yii\helpers\Html::a('view', $u, $options);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
