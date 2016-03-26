
<h1><?php echo \yii\helpers\Html::encode($this->title); ?></h1>

<div class="grid justify-space-around">
    <div class="span-10">
        <?php foreach($posts->posts as $v){ ?>
            <h2>
                <a href="<?php echo \yii\helpers\Url::to(['view', 'slug' => $v->slug]); ?>"><?php echo $v->title; ?></a>
            </h2>
            <?php //echo $v->anons;?>
        <?php }?>
    </div>

</div>