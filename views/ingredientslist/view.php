<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ingredientslist */

$this->title = $model->drinkid;
$this->params['breadcrumbs'][] = ['label' => 'Ingredientslists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredientslist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'drinkid' => $model->drinkid, 'ingredientid' => $model->ingredientid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'drinkid' => $model->drinkid, 'ingredientid' => $model->ingredientid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'drinkid',
            'ingredientid',
            'quantity',
        ],
    ]) ?>

</div>
