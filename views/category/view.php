<?php if (!empty($posts)) : ?>

    <?php foreach ($posts as $post) : ?>
        <div class="content-grid">					 
            <div class="content-grid-info">
                    <!--<a href="/"><img src="images/post1.jpg" title="" /></a> -->

                <div class="post-info">
                    <h4><a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $post->id]) ?>"><?= $post->title ?></a>  <span class="label label-default">July 30, 2014 / 27 Comments</span></h4>
                    <p><?= $post->excerpt ?></p>
                    <!--   yii2-social-share A beautiful social share buttons for yii2.-->
                    <?//=
                    \imanilchaudhari\socialshare\ShareButton::widget([
                        'style' => 'horizontal',
                        'networks' => ['facebook', 'googleplus', 'linkedin', 'twitter'],
                        'data_via' => 'imanilchaudhari', //twitter username (for twitter only, if exists else leave empty)
                    ]);
                    ?>
                    <a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $post->id]) ?>"><span></span>Читать полностью...</a> | Категория 
                    <a class="btn btn-default"  role="button" href="<?= \yii\helpers\Url::to(['category/view', 'id' => $post->category->id]) ?>"><?= $post->category->name ?></a> 

                </div>
            </div>


        </div>

    <?php endforeach; ?>
    <?= yii\widgets\LinkPager::widget(['pagination' => $pages]); ?>


<?php else: ?>
    <blockquote>В этой категории пока пусто...</blockquote>
<?php endif; ?>