<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ingredientslist */

$this->title = 'Update Ingredientslist: ' . $model->drinkid;
$this->params['breadcrumbs'][] = ['label' => 'Ingredientslists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->drinkid, 'url' => ['view', 'drinkid' => $model->drinkid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ingredientslist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
