<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ingredientslist */

$this->title = 'Create Ingredientslist';
$this->params['breadcrumbs'][] = ['label' => 'Ingredientslists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredientslist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
