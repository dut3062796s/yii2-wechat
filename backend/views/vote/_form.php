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

    <?= $form->field($model, 'cover')->widget(\yidashi\webuploader\Webuploader::className()) ?>

    <?= $form->field($model, 'description')->widget(\kucha\ueditor\UEditor::className()) ?>

    <div class="form-group">
    <?= \kartik\datetime\DateTimePicker::widget([
        'name' => Html::getInputName($model, 'begin_at'),
        'value' => Yii::$app->formatter->asDatetime($model->begin_at)
    ])?>
    </div>

    <div class="form-group">
    <?= \kartik\datetime\DateTimePicker::widget([
        'name' => Html::getInputName($model, 'end_at'),
        'value' => Yii::$app->formatter->asDatetime($model->end_at)
    ])?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
