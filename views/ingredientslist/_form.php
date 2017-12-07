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
      $query = new query();
      $query->select('ingredientid')->where("ingredientid NOT IN (SELECT ingredientid FROM ingredientlist WHERE drinkid = $model->drinkid)");
      //$list = Ingredients::findAll(array("ingredientid NOT IN (SELECT ingredientid FROM ingredientlist WHERE drinkid = $model->drinkid)",));
      //$list = $model->findall('ingredientid');
      $items = ArrayHelper::map($query, 'ingredientid', 'ingredientname');
    ?>
      <?= $form->field($model, 'ingredientid')->dropDownList($items)?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
