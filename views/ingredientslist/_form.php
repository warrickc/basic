<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Ingredients;

/* @var $this yii\web\View */
/* @var $model app\models\Ingredientslist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ingredientslist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
      $list = $model->findall('ingredientid');
      $items = ArrayHelper::map(Ingredients::find()->where(["ingredientid NOT IN $list"]), 'ingredientid', 'ingredientname');
    ?>
      <?= $form->field($model, 'ingredientid')->dropDownList($items)?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
