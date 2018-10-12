<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use yii\base\Widget;
use app\models\Post;
use yii\data\ActiveDataProvider;

class ListWidget extends Widget {

    public function run() {

        $LastPost = Post::find()->orderBy('id desc')->limit(3)->all();
        return $this->render('list_post', compact('LastPost'));
    }

}
