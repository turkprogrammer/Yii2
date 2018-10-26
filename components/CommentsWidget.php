<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace app\components;

use yii\base\Widget; 
use app\models\Comments;


class CommentsWidget extends Widget{
    
    public function run() {
        
        //echo __FILE__;
       //return $this->hasMany(Comments::classname(), ['post_id' => 'id']);
     
        $comments = Comments::find()->orderBy('date desc')->limit(2)->all();
        return $this->render('comments', compact('comments'));
           
    }
}