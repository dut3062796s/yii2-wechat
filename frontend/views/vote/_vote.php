<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/23
 * Time: 下午5:07
 */
use common\helpers\Html;
?>
<div class="vote">
    <a href="<?= \yii\helpers\Url::to(['view', 'id' => $model->id]) ?>">
        <h3><?= Html::encode($model->name) ?></h3>
        <div><?= Html::img($model->cover, ['width' => 100, 'height' => 100]) ?></div>
        <div>编号:<?= $model->id ?> 票数:<?= $model->num ?></div>
    </a>
</div>
