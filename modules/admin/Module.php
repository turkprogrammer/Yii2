<?php

namespace app\modules\admin;

use yii\web\Controller;
use yii\filters\AccessControl;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module {

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init() {
        parent::init();

        // custom initialization code goes here
    }

    /* определяет правило, согласно которому доступ к модулю (‘allow’ => true) имеют только авторизованные пользователи
     *  (‘roles’ => ['@']). Знак @ — это специальный символ, обозначающий авторизованного пользователя */

    public function behaviors() {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function($rule, $action) {
                            return \Yii::$app->user->identity->role === 'admin'; // проверка, если роль админ то возвращается тру, в противном случае фальш
                            /*if (\Yii::$app->user->identity->role !== 'admin') {
                                return \Yii::$app->getResponse()->redirect('/');
                            } else {
                                return 1;
                            }*/
                        }
                    ],
                ],
            ],
        ];
    }

}
