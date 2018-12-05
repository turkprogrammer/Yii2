<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\StringHelper;

$this->title = 'Страницы';
$this->params['breadcrumbs'][] = $this->title;
?>



<ul class="list-group">
    <?php foreach ($page as $p) : ?>
        <li class="list-group-item">
            <h4><a href="<?= \yii\helpers\Url::to(['page/view', 'id' => $p->id]) ?>"><?= $p->title ?></a> <span class="label label-default"><?= $p->created ?> </span></h4>
            <p><?= $this->title = StringHelper::truncateWords($p['content'], 7, '...'); ?></p>
        </li>

    <?php endforeach; ?>
</ul>