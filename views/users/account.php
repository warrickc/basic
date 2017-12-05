<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\Drinks;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = "My Account";

?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Change Password', ['update', 'id' => $model->userid], ['class' => 'btn btn-primary']) ?>
    </p>

	<?php
		/*DetailView::widget([
			'model' => $currUser,
			'attributes' => [
				'username',
			],
		]);*/
	?>


    <div class="col-md-5 pull-left">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'firstname',
            'lastname',
            'email:email',
        ],
    ]) ?>
    </div>

   <div class="col-md-5 pull-right">
     <?= GridView::widget([
       'dataProvider' => $dataProvider,
       'model' => $model,
       'columns' => [
         'label' => 'Drink Name',
         'value' => 'drinkname',
       ],
       [
         'label' => 'Rating',
         'value' => 'drinkname',
       ],
     ]) ?>
   </div>


</div>
