<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;



$this->title = $page->title;
$this->params['breadcrumbs'][] = $page->title;
?>

<h2><?= $this->title; ?></h2>
<p>
        
        <?= $page->content; ?>
</p>
</br>
<span class="label label-info"><?= $page->created ?></span>


