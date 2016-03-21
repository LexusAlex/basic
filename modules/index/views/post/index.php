<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\index\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<h1><?= Html::encode($this->title) ?></h1>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?
\Yii::$container->set('yii\widgets\LinkPager', [
    'options' => ['class' => 'paginator'],
    'firstPageCssClass' => '',
    'firstPageLabel' => 'Первая',
    'lastPageLabel' => 'Последняя',
    'nextPageLabel' => 'Следующая',
    'prevPageLabel' => 'Предыдущая',
    'activePageCssClass' => 'current',
    'maxButtonCount' => 3,
]);
?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'tableOptions' => ['class' => ''],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'title',
        [
            'attribute' => 'created_at',
            'label' => 'Создано',
            'format' => 'datetime', // Доступные модификаторы - date:datetime:time
            //'headerOptions' => ['width' => '200'],
        ],
        [
            'attribute' => 'updated_at',
            'label' => 'Обновлено',
            'format' => 'datetime', // Доступные модификаторы - date:datetime:time
            //'headerOptions' => ['width' => '200'],
        ],
        //'anons:ntext',
        //'content:ntext',
        [
            'attribute' => 'status',
            'label' => 'Статус',
            'content' => function ($model, $key, $index, $column) {
                if ($model->status === 1) {
                    return 'Опубликован';
                } elseif ($model->status === 2) {
                    return 'Закрытый';
                } else {
                    return 'Черновик';
                }
            }
        ],
        // 'created_at',
        // 'updated_at',
        // 'slug',
        'category_id',

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
                    $u = \yii\helpers\Url::to(['/index/default/view', 'slug' => $model->slug]);
                    return \yii\helpers\Html::a('view', $u, $options);
                },
            ],
        ],
    ],
]); ?>
