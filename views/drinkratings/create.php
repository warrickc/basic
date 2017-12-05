<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Drinkratings */

$this->title = 'Create Drinkratings';
$this->params['breadcrumbs'][] = ['label' => 'Drinkratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drinkratings-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
