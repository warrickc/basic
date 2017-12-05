<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IngredientslistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ingredientslists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredientslist-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ingredientslist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'drinkid',
            'ingredientid',
            'quantity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
