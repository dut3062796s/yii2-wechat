<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/24
 * Time: 下午4:57
 */
?>

<h1 style="text-align:center"><?= $model->name ?></h1>
<div style="text-align:center"><?= \common\helpers\Html::img($model->cover) ?></div>
<div class="jumbotron">
    <?= \yii\helpers\HtmlPurifier::process($model->description) ?>
</div>