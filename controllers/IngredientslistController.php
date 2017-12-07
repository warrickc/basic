<?php

namespace app\controllers;

use Yii;
use app\models\Ingredientslist;
use app\models\IngredientslistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IngredientslistController implements the CRUD actions for Ingredientslist model.
 */
class IngredientslistController extends Controller
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
     * Lists all Ingredientslist models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IngredientslistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ingredientslist model.
     * @param integer $drinkid
     * @param integer $ingredientid
     * @return mixed
     */
    public function actionView($drinkid, $ingredientid)
    {
        return $this->render('view', [
            'model' => $this->findModel($drinkid, $ingredientid),
        ]);
    }

    /**
     * Creates a new Ingredientslist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ingredientslist();
        $model->drinkid = Yii::$app->getRequest()->getQueryParam('drinkid');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['\drinks\view', 'id' => $model->drinkid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ingredientslist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $drinkid
     * @param integer $ingredientid
     * @return mixed
     */
    public function actionUpdate($drinkid, $ingredientid)
    {
        $model = $this->findModel($drinkid, $ingredientid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'drinkid' => $model->drinkid, 'ingredientid' => $model->ingredientid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ingredientslist model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $drinkid
     * @param integer $ingredientid
     * @return mixed
     */
    public function actionDelete($drinkid, $ingredientid)
    {
        $this->findModel($drinkid, $ingredientid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ingredientslist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $drinkid
     * @param integer $ingredientid
     * @return Ingredientslist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($drinkid, $ingredientid)
    {
        if (($model = Ingredientslist::findOne(['drinkid' => $drinkid, 'ingredientid' => $ingredientid])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
