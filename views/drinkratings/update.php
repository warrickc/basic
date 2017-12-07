<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Drinkratings */

$this->title = 'Update Your Rating'
?>
<div class="drinkratings-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
