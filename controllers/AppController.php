<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;
use yii\web\Controller;


class AppController extends Controller {
    
    public function debug($arr){
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }
    
    protected function setMeta($title = null, $keywords = null, $desc = null) {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$desc"]);
    }
    
}
