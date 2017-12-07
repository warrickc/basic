<?php

namespace app\controllers;

use Yii;
use app\models\Drinkratings;
use app\models\DrinkratingsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DrinkratingsController implements the CRUD actions for Drinkratings model.
 */
class DrinkratingsController extends Controller
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
     * Lists all Drinkratings models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DrinkratingsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Drinkratings model.
     * @param integer $userid
     * @param integer $drinkid
     * @return mixed
     */
    public function actionView($userid, $drinkid)
    {
        return $this->render('view', [
            'model' => $this->findModel($userid, $drinkid),
        ]);
    }

    /**
     * Creates a new Drinkratings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Drinkratings();
        $model->userid = Yii::$app->user->identity->userid;
        $model->drinkid = Yii::$app->getRequest()->getQueryParam('drinkid');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/drinks/view', 'id' => $model->drinkid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Drinkratings model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $userid
     * @param integer $drinkid
     * @return mixed
     */
    public function actionUpdate($userid, $drinkid)
    {
        $model = $this->findModel($userid, $drinkid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/drinks/view', 'id' => $model->drinkid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Drinkratings model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $userid
     * @param integer $drinkid
     * @return mixed
     */
    public function actionDelete($userid, $drinkid)
    {
        $this->findModel($userid, $drinkid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Drinkratings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $userid
     * @param integer $drinkid
     * @return Drinkratings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($userid, $drinkid)
    {
        if (($model = Drinkratings::findOne(['userid' => $userid, 'drinkid' => $drinkid])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
