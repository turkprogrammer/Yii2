<?php

namespace app\controllers;
use app\models\Post;


class PostController extends AppController
{
    public function actionIndex()
    {
        $query = Post::find()->select('id, title, excerpt, category_id, created, updated')->orderBy('id desc');
        $pages = new \yii\data\Pagination(['totalCount' => $query->count(), 'pageSize'=> 2, 'pageSizeParam' => false, 'forcePageParam' => false]); //Пагинация, сичтаем общее колво записей и передаем в парамтр вывода лимит на страницу
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();    
         
        return $this->render('index', compact('posts','pages'));
    }
    
    public function actionView()
            
    {
        $id = \Yii ::$app->request->get('id');
        $post = Post::findOne($id);    
        if (empty($post)) throw new \yii\web\HttpException(404, 'Mazafaka'); // если пост удален то выбрасываем исключение 404
        $this->setMeta($post->title, $post->keywords, $post->description);
        return $this->render('view', compact('post'));
       
    }


}
