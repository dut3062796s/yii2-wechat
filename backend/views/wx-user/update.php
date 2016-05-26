<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WxUser */

$this->title = 'Update Wx User: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Wx Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wx-user-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
