<?php

/* @var $this yii\web\View */
use yii\grid\GridView;
use app\models\Drinks;

$this->title = 'Barfly';
?>
<div class="site-index">
      <div class="jumbotron">
          <h1>HOME</h1>
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
                      ['class' => 'yii\grid\SerialColumn'],
                      'drinkname',
                      'rating',
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
