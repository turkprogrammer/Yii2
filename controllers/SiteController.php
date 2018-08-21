<?php

namespace app\controllers;
//namespace app\models\Post;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Post;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
        //$posts = Post::find()->select('id, title, excerpt')->all();
        $query = Post::find()->select('id, title, excerpt, category_id')->orderBy('id desc'); //with() -жадная загрузка
        $pages = new \yii\data\Pagination(['totalCount' => $query->count(), 'pageSize'=> 2, 'pageSizeParam' => false, 'forcePageParam' => false]); //Пагинация, сичтаем общее колво записей и передаем в парамтр вывода лимит на страницу
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        
            if (file_exists('H:\OSPanel\domains\yii\db\home.db'))
            { 
            $text = file_get_contents("H:\OSPanel\domains\yii\db\home.db");
           /* $data = str_replace("\n", "<br>", $text);*/
            return $this->render('index', compact('text', 'posts','pages'));
            
        }
        else echo 'No such file or directory';    
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

        $model->password = '';
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
        
        if (file_exists('H:\OSPanel\domains\yii\db\about.db'))
            { 
            $text = file_get_contents("H:\OSPanel\domains\yii\db\about.db");
            $data = str_replace("\n", "<br>", $text);
            return $this->render('about', compact('data'));
            
        }
        else echo 'No such file or directory';        
            
        
        
    }
    
    public function actionHello() {
       if (file_exists('H:\OSPanel\domains\yii\db\hello.db'))
            { 
            $text = file_get_contents("H:\OSPanel\domains\yii\db\hello.db");
            $data = str_replace("\n", "<br>", $text);
            return $this->render('hello', compact('data'));
            
        }
        else echo 'No such file or directory';        
            
        
       
    }
}
