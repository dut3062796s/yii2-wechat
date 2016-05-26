<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vote */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '投票', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vote-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'cover',
            'description:ntext',
            'created_at:datetime',
            'updated_at:datetime',
            'begin_at:datetime',
            'end_at:datetime',
        ],
    ]) ?>

</div>
