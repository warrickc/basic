<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use app\models\Drinks;
use yii\data\Pagination;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = new query();
        $query ->select
        (['drinkname', 'averagerating'])
        ->from('drinks')
        ->orderBy(['averagerating' => SORT_DESC])
        ->limit(5);

        $query2 = new query();
        $query2 ->select
        (['drinkname'])
        ->from('drinks')
        ->orderBy(['drinkid' => SORT_DESC])
        ->limit(5);
        /*$query2 = (new \yii\db\Query())
        ->select("rating, drinkid")
        ->from('drinkratings');
        $unionQuery = (new \yii\db\Query())
        ->from(["drinkname, rating" => $query1->union($query2)])
        ->orderBy(['rating' => SORT_DESC])*/
        //->limit(3);
        $dataProvider = new ActiveDataProvider([
          //'query' => $unionQuery,
          'query' => $query,
          'pagination' => false,
        ]);
        $otherdataProvider = new ActiveDataProvider([
          'query' => $query2,
          'pagination' => false,
        ]);
        /*$query = Drinks::find();
        $dataProvider = new ActiveDataProvider([
          'query' => $query,
        ]);*/
        return $this->render('index', [
          'dataProvider' => $dataProvider,
          'otherdataProvider' => $otherdataProvider,
        ]);

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
