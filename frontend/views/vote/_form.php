<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Vote */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vote-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cover')->widget(\yidashi\webuploader\Webuploader::className(), [
        'server' => \yii\helpers\Url::to(['/vote/webupload']),
        'innerHTML' => '<button class="btn btn-primary">本地上传</button>'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '参加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
