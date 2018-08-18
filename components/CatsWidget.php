<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace yii\gii\components;
use yii\base\Widget;

class CatsWidget extends Widget {
    
    public function run() {
        
        $cats = \app\models\Category::find()->select('id','name')->orderBy('name')->all;
        
    }
}
