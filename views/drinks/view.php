<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Drinks */

$this->title = $model->drinkid;
$this->params['breadcrumbs'][] = ['label' => 'Drinks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drinks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->drinkid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->drinkid], [
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
            /*'drinkid',*/
            'drinkname',
            'instructions',
        ],
    ]) ?>

</div>
