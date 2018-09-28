<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;
use yii\base\Widget;

class CatsWidget extends Widget {

    public function run() {
        $html = \Yii::$app->cache->get('catsMenu'); // кешируем запрос по ключу
        if ($html == NULL) {
            $cats = \app\models\Category::find()->select('id, name')->asArray()->orderBy('name')->all(); // если кеш пустой то выполняем запрос и ложим его в кеш
            
            $html = $this->render('category', compact('cats'));
            \Yii::$app->cache->set('catsMenu', $html, 15);
        }

        return $html;
    }

}
