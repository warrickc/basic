<?php

/* @var $this yii\web\View */
use yii\grid\GridView;
use app\models\Drinks;
use yii\helpers\Html;

$this->title = 'Barfly';
?>
<div class="site-index">
      <div class="jumbotron">
          <h1>BARFLY</h1>
          <?php if(Yii::$app->user->isGuest){
            echo Html::tag('h2','Welcome to the drink super(ish)-database!');
            echo Html::a('Click to Sign In or Sign Up', ['login'], ['class' => 'btn btn-success']);
            if(!Yii::$app->user->isGuest){
              $username = uc(Yii::$app->user->identity->username);
              echo Html::tag('h2', "Welcome ".$username."!");
            }
          }?>

      </div>

      <div class="body-content">

          <div class="row">
              <div class="col-md-3">
                  <h2>News Feed</h2>
                  <?= GridView::widget([
                    'dataProvider' => $otherdataProvider,
                    'summary' => "",
                    'columns' => [
                    [ 'label' => 'Newest Drinks',
                      'value' => 'drinkname'],

                      /*[
                        'label' => 'Rating',
                        'value' => function($data){
                          return Drinks::get_drink_ratings($data->drinkid);
                        },
                      ],*/
                    ],
                  ]) ?>

              </div>
              <div class="col-md-5 pull-right">
                  <h2>Most Popular</h2>
                  <!--<ul>
                    <li>Drink #1</li>
                    <li>Drink #2</li>
                    <li>Drink #3</li>
                  </ul>-->
                  <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => "",
                    'columns' => [
                    [ 'label' => 'Drink Name',
                      'value' => 'drinkname'],
                    [ 'label' => 'Rating',
                      'value' => 'averagerating'],

                      /*[
                        'label' => 'Rating',
                        'value' => function($data){
                          return Drinks::get_drink_ratings($data->drinkid);
                        },
                      ],*/
                    ],
                  ]) ?>
              </div>
          </div>

      </div>
</div>
