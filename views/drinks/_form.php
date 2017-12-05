<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Drinks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="drinks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'drinkname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instructions')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
