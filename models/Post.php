<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord {

    public static function tablename() {
        return 'post';
    }

    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'category_id']); //возвращаем выбранный тип связи, савязываем таблицу по полям ['id'=>'category_id']
    }

}
