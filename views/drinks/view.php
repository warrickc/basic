<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Drinks */

$this->title = $model->drinkname;
$this->params['breadcrumbs'][] = ['label' => 'Drinks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drinks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            /*'drinkid',*/
            /*'drinkname',*/
            'instructions',
        ],
    ]) ?>

    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'columns' => [
        ['label' => 'Ingredient',
        'value' => 'ingredientname'],
        ['label' => 'Quantity',
        'value' => 'quantity']
      ],
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($currentRating, 'rating')->dropdownList([
      1 => '1 - Sean',
      2 => '2 - Not quite Sean',
      3 => '3 - David',
      4 => '4 - Almost Perfect',
      5 => '5 - Our Lord and Savior Curtis Warrick'
    ]) ?>
    <div>
      <?= Html::submitButton('UpdateRating', ['class' => 'btn btn-sucess']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
