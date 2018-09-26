<?php

namespace app\controllers;
use Yii;
use app\models\Post;
use app\models\Comments;
use app\models\User;

class PostController extends AppController {

    public function actionIndex() {
        $query = Post::find()->select('id, title, excerpt, category_id, created, updated, image')->orderBy('id desc');
        $pages = new \yii\data\Pagination(['totalCount' => $query->count(), 'pageSize' => 2, 'pageSizeParam' => false, 'forcePageParam' => false]); //Пагинация, сичтаем общее колво записей и передаем в парамтр вывода лимит на страницу
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', compact('posts', 'pages'));
    }

    public function actionView() {
        $id = \Yii ::$app->request->get('id');
        $post = Post::findOne($id);
        if (empty($post))
            throw new \yii\web\HttpException(404, 'Mazafaka'); // если пост удален то выбрасываем исключение 404
            /*
             * вытаскиваем комментарии в массиве
             */
        $this->setMeta($post->title, $post->keywords, $post->description);
        $comments = Comments::find()->where(['post_id' => $post])->indexBy('id')->asArray()->all();
        $tree = [];
        foreach ($comments as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $comments[$node['parent_id']]['childs'][$node['id']] = &$node;
            }
        }
        $comments = new Comments();
        if ($comments->load(Yii::$app->request->post())) {
            $user = User::findOne(Yii::$app->user->id);
            $comments->post_id = $post->id;
            $comments->username = $user->username;
            $comments->parent_id = (int)$comments->parent_id;
            //self::debug($tree); exit();
            $comments->save();         
            return $this->redirect(['view', 'id' => $post->id]);
            
        } else {
            return $this->render('view', compact('post', 'tree', 'comments'));
        }
     
    }

}
