<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Mp */

$this->title = '添加新公众号';
$this->params['breadcrumbs'][] = ['label' => '公众号', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mp-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
