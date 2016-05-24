<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vote */

$this->title = '更新投票: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '投票', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vote-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
