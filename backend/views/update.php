<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PhoneBook */

$this->title = 'Update Phone Book: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Phone Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phone-book-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
