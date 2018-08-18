<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;
use yii\base\Widget; 

class TestWidget extends Widget{
    
    public function run() {
        
        return $this->render('test');
    }
}