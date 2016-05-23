<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Vote */

$this->title = '参加大赛';
$this->params['breadcrumbs'][] = ['label' => '参赛人员列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vote-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
