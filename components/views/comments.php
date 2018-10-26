<?php

use yii\helpers\StringHelper;

//$shortName = StringHelper::truncate($comment['name'], 240)
?>

<ul class="list-group">
   <?php foreach ($comments as $comment) : ?>
  <li class="list-group-item">
    <span class="badge"><?= $comment->date ?></span>
	<span class="label label-primary"><?=$comment['username']?></span>
    <a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $comment['post_id']]) ?>" ><?= $comment->text ?> </a> 
	
  </li>
  <?php endforeach; ?>
</ul>