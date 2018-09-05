<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('SetImage', ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'category_id',
             [
                'attribute' =>'category_id',
                'value' => $model->category->name,
            ],
            
            'title',
            'excerpt',
            'text:html',
            'keywords',
            'description',
            'created',
             [
                'format' => 'html',
                'label' => 'Изображение',               
                'value' => function($data) {
                    return Html::img($data->getImage(), ['width' => 150]);
                }
            ],
            //'updated',
            [
    'attribute' => 'updated',
    'format' => ['date', 'dd/MM/yyyy']
],
        ],
    ]) ?>

</div>
