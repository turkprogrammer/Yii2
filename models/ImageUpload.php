<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model {

    public $image;

    /**
     * валидируем поле загрузки файла
     * 
     */
    public function rules() {
        return[
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg, png'],
        ];
    }

    public function uploadFile(UploadedFile $file, $currentImage) {
        // var_dump($file); die();
        //die($currentImage);
        $this->image = $file;
        if ($this->validate()) {
//удаляем картинку только в том случае если она существует
            if (file_exists(Yii::getAlias('@web') . 'uploads/post/' . $currentImage) && (!empty($currentImage)) && $currentImage != null) {

                unlink(Yii::getAlias('@web') . 'uploads/post/' . $currentImage); // удаляем старую картинку 
            }
            $filename = strtolower(md5(uniqid($file->baseName))) . '.' . $file->extension;
            $file->saveAs(Yii::getAlias('@web') . 'uploads/post/' . $filename); //сохраняем файл полученный из формы
            return $filename;
        }
    }

    /**
     * 
     * сокращенные методы для удаления картинки с сервера используемы в админкскйо модели Пост
     */
    private function getFolder() {
        return Yii::getAlias('@web') . 'uploads/post/';
    }

    public function fileExists($currentImage) {
        if (!empty($currentImage) && $currentImage != null) {
            return file_exists($this->getFolder() . $currentImage);
        }
    }

    public function deleteCurrentImage($currentImage) {
        if ($this->fileExists($currentImage)) {
            unlink($this->getFolder() . $currentImage);
        }
    }

}
