<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use yii\base\Model;


class SignupForm extends Model {
    
    public $username; //поля из Бд обьвялем т.к. не используем класс ActiveRecord
    public $password;
    
    /*Пишем правило валидации полей*/
    public function rules() {
        return [
          [['username', 'password'], 'required'], //массив правил валидации
        ];
        
    }
}
