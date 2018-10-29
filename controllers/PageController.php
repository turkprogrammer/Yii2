<?php

namespace app\controllers;
use app\models\Page;
use yii\web\NotFoundHttpException;


class PageController extends AppController
{
    public function actionIndex()
    {
        
		$page = Page::find()->all();
		//self::debug($page); exit();
		return $this->render('index',compact('page'));
    }
	
	public function actionView($id) {
		$id = \Yii ::$app->request->get('id');
        $page = Page::findOne($id);
		//self::debug($page); exit();
		
        if (empty($page))
            throw new \yii\web\HttpException(404, 'Mazafaka'); // если пост удален то выбрасываем исключение 404
          
        //$this->setMeta($page->title, $page->keywords, $page->description);
		
		return $this->render('view', compact('page'));
	}

}
