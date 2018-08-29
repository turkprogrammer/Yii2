<?php
/* @var $this yii\web\View */
$this->title = $post->title;
$this->params['breadcrumbs'][] = $post->title;
?>

<h2><?php echo $this->title; ?></h2>
<p>
    <?php echo $post->text; ?>
</p>
</br>
<span class="label label-info"><?= $post->updated ?></span>
</br>
</br>

<!--   yii2-social-share A beautiful social share buttons for yii2.-->
<?=
\imanilchaudhari\socialshare\ShareButton::widget([
    'style' => 'horizontal',
    'networks' => ['facebook', 'googleplus', 'linkedin', 'twitter'],
    'data_via' => 'imanilchaudhari', //twitter username (for twitter only, if exists else leave empty)
]);
?>