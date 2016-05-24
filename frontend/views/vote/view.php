<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/24
 * Time: 下午4:57
 */
?>
<style>
    .cover{margin:0 auto;max-width:95%;display:block;}
    .content img{margin:0 auto;max-width:95%;display:block;}
</style>
<h1 style="text-align:center"><?= $model->name ?></h1>
<div class="cover"><?= \common\helpers\Html::img($model->cover) ?></div>
<div class="content">
    <?= \yii\helpers\HtmlPurifier::process($model->description) ?>
</div>