<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="jumbotron">
 <?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'username')?>
<?= $form->field($model, 'password')->passwordInput()?>
 <div class="form-group">
            <div >
                <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

  <?php ActiveForm::end(); ?>
  </div>