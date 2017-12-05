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



	<?php
		/*DetailView::widget([
			'model' => $currUser,
			'attributes' => [
				'username',
			],
		]);*/
	?>


    <div class="col-md-5 pull-left">
      <h3>Account Information</h3>
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
     <h3>Your rated drinks</h3>
     <?= GridView::widget([
       'dataProvider' => $dataProvider,
       'columns' => [
         ['label' => 'Drink Name',
         'value' => 'drinkname',],
         ['label' => 'Rating',
         'value' => 'rating',],
       ],
     ]) ?>
   </div>
   <p>
       <?= Html::a('Change Password', ['update', 'id' => $model->userid], ['class' => 'btn btn-primary']) ?>
   </p>

</div>
