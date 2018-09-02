<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
?>


<dl>
    <dt><?= Html::a(Html::encode($model->title), Url::toRoute(['post/view', 'id' => $model->id]), ['title' => $model->title]) ?></dt>
    <dd><?= Html::encode($model->excerpt); ?></dd>
</dl>