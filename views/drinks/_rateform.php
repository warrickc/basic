<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="Rate-form">

  <?php $form = ActiveForm::begin(); ?>
  <?= $form->field($rate, 'rating')->dropdownList([
    1 => '1 - Sean',
    2 => '2 - Not quite Sean',
    3 => '3 - David',
    4 => '4 - Almost Perfect',
    5 => '5 - Our Lord and Savior Curtis Warrick'
  ]) ?>
  <div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
  </div>

  <?php ActiveForm::end(); ?>



</div>
