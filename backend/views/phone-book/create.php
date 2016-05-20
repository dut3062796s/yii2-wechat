<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PhoneBook */

$this->title = 'Create Phone Book';
$this->params['breadcrumbs'][] = ['label' => 'Phone Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-book-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
