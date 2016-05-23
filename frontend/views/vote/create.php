<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Vote */

$this->title = 'Create Vote';
$this->params['breadcrumbs'][] = ['label' => 'Votes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vote-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
