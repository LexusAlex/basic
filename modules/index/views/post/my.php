<h1>Колличество приватных записей : <?php echo count($privatePosts);?></h1>
<?php
foreach($privatePosts as $v){ ?>
    <h3><ins><?php echo 'id: '.$v->id.' '.$v->title.' ('.date('d-m-Y H:i:s',$v->created_at).')';?></ins> <?php echo \yii\helpers\Html::a('Обновить',['post/update','id'=>$v->id])?></h3>
    <div><h4>Anons :</h4><?php echo $v->anons;?></div>
    <div><h4>Content :</h4><?php echo $v->content;?></div>
    <hr>
<?php } ?>

<hr>
<hr>

<h1>Колличество записей в черновике : <?php echo count($draftPosts);?></h1>
<?php
foreach($draftPosts as $v){ ?>
    <h3><ins><?php echo 'id: '.$v->id.' '.$v->title.' ('.date('d-m-Y H:i:s',$v->created_at).')';?></ins> <?php echo \yii\helpers\Html::a('Обновить',['post/update','id'=>$v->id])?></h3>
    <div><h4>Anons :</h4><?php echo $v->anons;?></div>
    <div><h4>Content :</h4><?php echo $v->content;?></div>
    <hr>
<?php } ?>
