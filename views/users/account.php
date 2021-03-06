<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\Drinks;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = ucwords($model->username).'\'s Page';

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
    <p>
     <?= Html::a('Change Password', ['update', 'id' => $model->userid], ['class' => 'btn btn-primary']) ?>
   </p>
    </div>

   <div class="col-md-5 pull-right">
     <h3>Your Recent Ratings</h3>
     <?= GridView::widget([
       'dataProvider' => $dataProvider,
       'summary' => "",
       'columns' => [
         ['label' => 'Drink Name',
         'value' => 'drinkname',],
         ['label' => 'Rating',
         'value' => 'rating',],
       ],
     ]) ?>
   </div>


</div>
