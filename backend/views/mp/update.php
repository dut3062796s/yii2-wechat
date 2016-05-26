<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mp */

$this->title = 'Update Mp: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Mps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mp-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
