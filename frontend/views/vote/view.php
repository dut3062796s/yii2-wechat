<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/24
 * Time: 下午4:57
 */
?>

<h1><?= $model->name ?></h1>
<div><?= \yii\helpers\HtmlPurifier::process($model->description) ?></div>