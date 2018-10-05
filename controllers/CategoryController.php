<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use app\models\Category; //подключаем модель Категорий
use app\models\Post; // подключаем модель Постов

class CategoryController extends AppController {

    public function behaviors() {
        return [
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['index'],
                'duration' => 60,
                'variations' => [
                    \Yii::$app->language,
                ],
                'dependency' => [
                    'class' => 'yii\caching\DbDependency',
                    'sql' => 'SELECT COUNT(*) FROM post',
                ],
            ],
        ];
    }

    public function actionIndex() {

        $modelCategory = new Category();
        $cats = $modelCategory::find()->all();
        //self::debug($cats);
        return $this->render('index', compact('cats'));
    }

    public function actionView() {

        $id = \Yii::$app->request->get('id');
        $category = Category::findOne($id);
        //self::debug($category); //print this array

        if (empty($category)) {
            throw new \yii\web\HttpException(404, 'Show Must Go on....');
        }


        $query = Post::find()->select('id, title, excerpt, category_id, updated')->where(['category_id' => $id])->orderBy('id desc');
        $pages = new \yii\data\Pagination(['totalCount' => $query->count(), 'pageSize' => 1, 'pageSizeParam' => false, 'forcePageParam' => false]); //Пагинация, сичтаем общее колво записей и передаем в парамтр вывода лимит на страницу
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta($category->name, $category->keywords, $category->description);
        $count = Post::find()->where(['category_id' => $id])->count();
        //  self::debug($count);
        return $this->render('view', compact('posts', 'pages', 'count'));
    }

}
