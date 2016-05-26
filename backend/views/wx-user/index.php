<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wx Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-user-index">


    <p>
        <?= Html::a('Create Wx User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    'id',
                    'openid',
                    'created_at',
                    'updated_at',
                    'is_subscribe',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

</div>
