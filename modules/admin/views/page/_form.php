<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
     <?=
    \vova07\imperavi\Widget::widget([
        'selector' => '#page-content',
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 100,
            'maxHeight' => 300,
            'plugins' => [
                'clips',
                'fullscreen',
            ],
        ],
    ]);
    ?>

    <?//= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
