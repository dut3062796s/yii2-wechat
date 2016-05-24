<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/24
 * Time: 下午4:57
 */
?>

<h1><?= $model->name ?></h1>
<div><?= \common\helpers\Html::img($model->cover) ?></div>
<div class="panel panel-default">
    <div class="panel-header">
        <h2>吹牛宣言</h2>
    </div>
    <div class="panel-body">
        <?= \yii\helpers\HtmlPurifier::process($model->description) ?>
    </div>
</div>