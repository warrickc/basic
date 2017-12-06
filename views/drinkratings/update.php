<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Drinkratings */

/*$this->title = 'Update Drinkratings: ' . $model->userid;
$this->params['breadcrumbs'][] = ['label' => 'Drinkratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->userid, 'url' => ['view', 'userid' => $model->userid, 'drinkid' => $model->drinkid]];
$this->params['breadcrumbs'][] = 'Update';*/
?>
<div class="drinkratings-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
