<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WxUser */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Wx Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-user-view">

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
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
            'openid',
            'created_at',
            'updated_at',
            'is_subscribe',
        ],
    ]) ?>

</div>
