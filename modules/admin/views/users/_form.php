<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Users;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'role')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'role')->dropDownList(\yii\helpers\ArrayHelper::map(Users::find()->where('role != :role', ['role' => 'admin'])->all(), 'role', 'role'));
    ?>


    <div class="form-group">
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

        <?php ActiveForm::end(); ?>

</div>
