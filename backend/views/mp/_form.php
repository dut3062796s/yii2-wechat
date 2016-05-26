<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Mp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'app_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'app_secret')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subscribe')->textarea(['rows' => 5]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
