<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Vote */

$this->title = '添加新参赛者';
$this->params['breadcrumbs'][] = ['label' => '参赛者', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vote-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
