<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ingredientslist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ingredientslist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'drinkid')->textInput() ?>

    <?= $form->field($model, 'ingredientid')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
