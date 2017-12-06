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
      'columns' => [
        ['label' => 'Ingredient',
        'value' => 'ingredientname'],
        ['label' => 'Quantity',
        'value' => 'quantity']
      ],
    ]) ?>
    <?php echo Html::a('Rate', ['/drinkratings/update', 'userid' => Yii:$app->user->identity->userid, 'drinkid' => $model->drinkid], ['class' => 'btn btn-success']); ?>


</div>
