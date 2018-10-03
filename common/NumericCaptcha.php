<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * расширим класс CaptchaAction и переопределим метод generateVerifyCode()
 */
namespace app\common;
 
use yii\captcha\CaptchaAction as DefaultCaptchaAction;
 
class NumericCaptcha extends DefaultCaptchaAction
{
    protected function generateVerifyCode()
    {
        //Длина
        $length = 5;
 
        //Цифры, которые используются при генерации
        $digits = '0123456789';
 
        $code = '';
        for($i = 0; $i < $length; $i++) {
            $code .= $digits[mt_rand(0, 9)];
        }
        return $code;
    }
}