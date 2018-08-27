<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'category_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'category_id')->dropDownList(yii\helpers\ArrayHelper::map($cats, 'id', 'name'))?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'excerpt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
	    <?= \vova07\imperavi\Widget::widget([
    'selector' => '#post-text',
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

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
