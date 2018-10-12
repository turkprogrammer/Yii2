<ul class="list-group">
    <?php foreach ($LastPost as $post) : ?>
        <li class="list-group-item"><a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $post->id]) ?>"><?= $post->title ?></a> <span class="label label-default"><?= $post->updated ?></span></li>
    <?php endforeach; ?>
</ul>