<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DrinksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Drinks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drinks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
      <?php if(!Yii::$app->user->isGuest){
        echo Html::a('Create Drinks', ['create'], ['class' => 'btn btn-success']);
      }?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'drinkid',*/
            'drinkname',
            'instructions',

            ['class' => 'yii\grid\ActionColumn',
              'template' => '{view}'
            ],
        ],
    ]); ?>
</div>
