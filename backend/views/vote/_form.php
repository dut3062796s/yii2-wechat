<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Vote */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vote-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mp_id')->dropDownList(\common\models\Mp::find()->select('title')->indexBy('id')->column()) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(\kucha\ueditor\UEditor::className()) ?>

    <?= $form->field($model, 'begin_at')->widget(\kartik\datetime\DateTimePicker::className()) ?>

    <?= $form->field($model, 'end_at')->widget(\kartik\datetime\DateTimePicker::className()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
