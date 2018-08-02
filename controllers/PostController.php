<?php

namespace app\controllers;
use app\models\Post;

class PostController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionView()
            
    {
        $id = \Yii ::$app->request->get('id');
        $post = Post::findOne($id);    
        if (empty($post)) throw new \yii\web\HttpException(404, 'Mazafaka'); // если пост удален то выбрасываем исключение 404
        return $this->render('view', compact('post'));
       
    }


}
