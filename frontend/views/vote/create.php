<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Vote */

$this->title = '参加大赛';
?>
<div class="vote-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
