<?php

namespace app\controllers;

use Yii;
use app\models\Drinks;
use app\models\DrinksSearch;
use app\models\Drinkratings;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\data\ActiveDataProvider;

/**
 * DrinksController implements the CRUD actions for Drinks model.
 */
class DrinksController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Drinks models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DrinksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Drinks model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $currentRating = new Drinkratings();
        $currentUser = Yii::$app->user->identity->userid;
        $currentRating = Drinkratings::find()->where("userid = $currentUser AND drinkid = $id");

        $query = new query();
        $query-> select(['ingredientname', 'quantity'])
        ->from(['ingredientslist', 'ingredients'])
        ->where("ingredientslist.ingredientid = ingredients.ingredientid AND ingredientslist.drinkid = $id");
        $otherdataProvider = new ActiveDataProvider([
          'query' => $query,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $otherdataProvider,
            'currentRating' => $currentRating,
        ]);
    }

    /**
     * Creates a new Drinks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Drinks();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->drinkid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Drinks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->drinkid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Drinks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Drinks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Drinks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Drinks::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionRating($id){

    }
}
