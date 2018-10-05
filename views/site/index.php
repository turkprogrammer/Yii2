<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Comments;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">





<?php //echo $text ;   ?>
            <br/>

            <?php if (!empty($posts)) : ?>

    <?php foreach ($posts as $post) : ?>
                    <div class="content-grid">					 
                        <div class="content-grid-info">
                                <!--<a href="/"><img src="images/post1.jpg" title="" /></a> -->

                            <div class="post-info">
                                <div class="row">
                                    <div class="col-md-4"><?= Html::img('@web/uploads/post/' . $post->image, ['alt' => $post->title, 'class' => 'img-rounded']) ?></div>
                                    <div class="col-md-8">   <h4><a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $post->id]) ?>"><?= $post->title ?>
        <?php $countComments = Comments::find()->where(['post_id' => $post->id])->count(); ?>
                                            </a>  <span class="label label-default"><?= $post->updated ?></span> <span class="label label-danger"> <?= $countComments ?></span>  <span class="glyphicon glyphicon-comment"></span> </h4>
                                        <p><?= $post->excerpt ?></p>

                                        <!--   yii2-social-share A beautiful social share buttons for yii2.-->
                                        <?//=
                                        \imanilchaudhari\socialshare\ShareButton::widget([
                                        'style' => 'horizontal',
                                        'networks' => ['facebook', 'googleplus', 'linkedin', 'twitter'],
                                        'data_via' => 'imanilchaudhari', //twitter username (for twitter only, if exists else leave empty)
                                        ]);
                                        ?>

                                        <a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $post->id]) ?>"><span></span>Читать полностью...</a> | <span class="glyphicon glyphicon-th-large"></span>   
                                        <a class="btn btn-default"  role="button" href="<?= \yii\helpers\Url::to(['category/view', 'id' => $post->category->id]) ?>"><?= $post->category->name ?></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                <?php endforeach; ?>
                <?= yii\widgets\LinkPager::widget(['pagination' => $pages]); ?>
<?php endif; ?>





        </div>

    </div>
</div>
