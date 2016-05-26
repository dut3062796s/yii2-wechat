<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Mp */

$this->title = 'Create Mp';
$this->params['breadcrumbs'][] = ['label' => 'Mps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mp-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
