<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/23
 * Time: 下午5:07
 */
use common\helpers\Html;
?>
<style>.media{margin-top:15px}</style>
<div class="media">
    <div class="media-left">
        <a href="<?= \yii\helpers\Url::to(['view', 'id' => $model->id]) ?>">
            <?= Html::img($model->cover, ['width' => 100, 'height' => 100]) ?>
        </a>
    </div>
    <div class="media-body">
        <a href="<?= \yii\helpers\Url::to(['view', 'id' => $model->id]) ?>">
            <h2 class="media-heading"><?= Html::encode($model->name) ?></h2>
            <?= Html::encode($model->description) ?>
            <div>编号:<?= $model->id ?> 票数:<?= $model->num ?></div>
        </a>
    </div>
</div>