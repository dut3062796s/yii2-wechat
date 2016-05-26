<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mp */

$this->title = '修改公众号: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '公众号', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="mp-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
