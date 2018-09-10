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
use app\models\SignupForm; //импортируем модель регистрации
use app\models\User;

class SiteController extends AppController {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
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
    public function actionIndex() {
        //$posts = Post::find()->select('id, title, excerpt')->all();
        $query = Post::find()->select('id, title, excerpt, category_id, created, updated,image')->orderBy('id desc'); //with() -жадная загрузка
        $pages = new \yii\data\Pagination(['totalCount' => $query->count(), 'pageSize' => 2, 'pageSizeParam' => false, 'forcePageParam' => false]); //Пагинация, сичтаем общее колво записей и передаем в парамтр вывода лимит на страницу
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

        if (file_exists('H:\OSPanel\domains\yii\db\home.db')) {
            $text = file_get_contents("H:\OSPanel\domains\yii\db\home.db");
            /* $data = str_replace("\n", "<br>", $text); */
            return $this->render('index', compact('text', 'posts', 'pages'));
        } else
            echo 'No such file or directory';
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionSignup() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->setMeta('Регистрация'); // для setMeta расширяем AppController
        $model = new SignupForm(); // создаем обьект модели app\models\SignupForm
        //принимаем данные из формы регистрации и валидируем их
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            // self::debug($model);
            $user = new User(); // создаем обьект класса User
            $user->username = $model->username;
            $user->password = \Yii::$app->security->generatePasswordHash($model->password); //хешируем пароль

            if ($user->save()) {
                \Yii::$app->user->login($user); //если регистрация прошла то авторизуем пользователя
                return $this->goHome(); // редирект на главную страницу
            }
        }
        return $this->render('signup', compact('model')); // передаем обьект модели
    }

    public function actionLogin() {
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
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact pages.
     *
     * @return Response|string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    public function actionAbout() {

        if (file_exists('H:\OSPanel\domains\yii\db\about.db')) {
            $text = file_get_contents("H:\OSPanel\domains\yii\db\about.db");
            $data = str_replace("\n", "<br>", $text);
            return $this->render('about', compact('data'));
        } else
            echo 'No such file or directory';
    }

    public function actionHello() {
        if (file_exists('H:\OSPanel\domains\yii\db\hello.db')) {
            $text = file_get_contents("H:\OSPanel\domains\yii\db\hello.db");
            $data = str_replace("\n", "<br>", $text);
            return $this->render('hello', compact('data'));
        } else
            echo 'No such file or directory';
    }

    /*
     * Поиск по сайту
     */

    public function actionSearch() {

        $search = \Yii::$app->request->get('search'); //получаем переменную search из формы поиска
        $search1 = str_replace(' ', '', $search); //удаляем пробелы
        $query = Post::find()->where(['like', 'replace(title, " ", "")', $search1]);
        $this->setMeta('Поиск', 'Blog', 'TurkProgrammer');
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pagesize' => 3],
        ]);

        return $this->render('search', compact('dataProvider', 'search1'));
    }

}
