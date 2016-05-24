<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/24
 * Time: 下午4:57
 */
use common\helpers\Html;
?>
<style>
    .cover img{margin:0 auto;max-width:95%;display:block;}
    .content img{margin:0 auto;max-width:95%;display:block;}
</style>
<h1 style="text-align:center"><?= $model->name ?></h1>
<div class="action">
    <span class="time"><?= Html::icon('clock-o')?> 参赛日期 : <?= date('Y-m-d', $model->created_at) ?></span>
    <span class="views"><?= Html::icon('eye')?> 当前票数 : <?= $model->num ?></span>
    <span class="views"><?= Html::icon('eye')?> 当前名次 : <?= $model->rank ?></span>
</div>
<div class="cover"><?= \common\helpers\Html::img($model->cover) ?></div>
<div class="content">
    <?= \yii\helpers\HtmlPurifier::process($model->description) ?>
</div>