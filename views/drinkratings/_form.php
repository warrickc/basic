<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\base\query;

/* @var $this yii\web\View */
/* @var $model app\models\Drinkratings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="drinkratings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <!--<?= $form->field($model, 'userid')->textInput() ?>
    <?= $form->field($model, 'drinkid')->textInput() ?>-->
    <div style= "visibility:hidden">
      <?= $model->userid = Yii::$app->user->identity->userid; ?>
      <?= $model->drinkid = Yii::$app->getRequest()->getQueryParam('drinkid'); ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
