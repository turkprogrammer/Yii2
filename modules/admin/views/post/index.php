<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            
             [
                'attribute' =>'category_id',
                'value' => function ($data) {
                   return $data->category->name;
                }
            ],
            //'category_id',
            'title',
            //'excerpt',
            //'text:html',
            //'keywords',
            //'description',
            //'created',
            //'updated',
                                [
    'attribute' => 'updated',
    'format' => ['date', 'dd/MM/yyyy']
],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
