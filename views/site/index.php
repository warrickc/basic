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
            echo Html::tag('h2','Welcome to the super drink database');
            echo Html::a('Sign in or Sign up', ['login'], ['class' => 'btn btn-success']);
            if(!Yii::$app->user->isGuest){
              $username = Html::encode($user->username);
              echo Html::tag('h2', 'Welcome'+$username);
            }
          }?>

      </div>

      <div class="body-content">

          <div class="row">
              <div class="col-md-5 pull-left">
                  <h2>News Feed</h2>

                  <p>Recent information about drinks go here</p>
                  <p>New Drinks</p>
                  <p>New bars</p>
                  <p>Menu changes</p>

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
