<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\ActiveForm;


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
      'summary' => "",
      'columns' => [
        ['label' => 'Ingredient',
        'value' => 'ingredientname'],
        ['label' => 'Quantity',
        'value' => 'quantity']
      ],
    ]) ?>
    <div class="pull-left">
    <?php echo Html::tag('h3', "Average Rating: ".$model->averagerating); ?>
    <?php if(!Yii::$app->user->isGuest){
      if($recordcheck->totalcount > 0){
        echo Html::a('Rate', ['/drinkratings/update', 'userid' => Yii::$app->user->identity->userid, 'drinkid' => $model->drinkid], ['class' => 'btn btn-success']);
      } else{
        echo Html::a('Rate', ['/drinkratings/create', 'userid' => Yii::$app->user->identity->userid, 'drinkid' => $model->drinkid], ['class' => 'btn btn-success']);
      }
    }
     ?>
    </div>
    <div class="pull-right">
      <?php if(!Yii::$app->user->isGuest){
        echo Html::a('Add Ingredients', ['/ingredientslist/create', 'drinkid' => $model->drinkid], ['class' => 'btn btn-success']);
      } ?>
    </div>


</div>
