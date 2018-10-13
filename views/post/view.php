<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


$this->title = $post->title;
$this->params['breadcrumbs'][] = $post->title;
?>

<h2><?php echo $this->title; ?></h2>
<p>
          
        <?= Html::img('@web/uploads/post/'.$post->image, ['alt' => $post->title,'class'=>'thumbnail']) ?>
        
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
</br>
</br>

<!--Коментарии-->

<div class="comments">
    <h3 class="title-comments">Комментарии</h3>

    <?php if (Yii::$app->user->isGuest) : ?>        


        <div class="alert alert-danger" role="alert">
            Чтобы добавить комментарий  <a href="#login" class="alert-link">Вход</a> /  <a href="#signup" class="alert-link">Регистрация</a>
        </div>

    <?php endif; ?>
    <ul class="media-list">
        <!-- Комментарий (уровень 1) -->
        <?php foreach ($tree as $comm) : ?>
            <li class="media">
                <div class="media-left">

                    <span class="media-object img-rounded"> <i class="fa fa-comment-o" aria-hidden="true"></i> </span>

                </div>
                <div class="media-body">
                    <div class="media-heading">
                        <div class="author"><i class="glyphicon glyphicon-user" aria-hidden="true"></i> <span class="label label-default"><?= $comm['username'] ?></span>  <span class="label label-default"><?= $comm['date'] ?></span> <i class="glyphicon glyphicon-time" aria-hidden="true"></i></div>
                    </div>
                    <div class="media-text text-justify"><blockquote style="font-family: 'Open Sans Condensed', sans-serif;"><?= $comm['text'] ?></blockquote></div>
                    <div class="footer-comment">
                        <span class="comment-reply">
                            <i class="glyphicon glyphicon-comment" aria-hidden="true"></i> <a href="#comments-text" class="reply" data-comment="<?= $comm['id'] ?>">ответить</a>
                        </span>
                    </div>

                    <!-- Вложенный медиа-компонент (уровень 2) -->
                    <?php if (isset($comm['childs'])) : ?>
                        <?php foreach ($comm['childs'] as $child) : ?>
                            <div class="media">
                                <div class="media-left">
                                    <span class="media-object img-rounded"> <i class="fa fa-comments-o" aria-hidden="true"></i> </span>
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <div class="author"><i class="glyphicon glyphicon-user" aria-hidden="true"></i> <span class="label label-default"><?= $child['username'] ?></span> <span class="label label-default"><?= $comm['date'] ?></span> <i class="glyphicon glyphicon-time" aria-hidden="true"></i></div>
                                    </div>
                                    <div class="media-text text-justify" ><blockquote class="blockquote" style="font-size: 12pt; font-family: 'Open Sans Condensed', sans-serif;"> <?= $child['text'] ?></blockquote></div>


                                    <!--<div class="footer-comment">

                                        </span>
                                        <span class="comment-reply">
                                        <a href="#" class="reply">ответить</a>
                                        </span>
                                    </div>-->

                                    <!-- Вложенный медиа-компонент (уровень 3) -->

                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <!-- Конец вложенного комментария (уровень 2) -->

                </div>
            </li>
            <!-- Конец комментария (уровень 1) -->
        <?php endforeach; ?>
    </ul>
    <?php if (!Yii::$app->user->isGuest) : ?>
        <?php $form = ActiveForm::begin() ?>

        <?= $form->field($comments, 'parent_id')->hiddenInput(['value' => 0])->label(false) ?>

        <?= $form->field($comments, 'text')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('Коментировать', ['class' => 'btn btn-primary']) ?>
        </div>


        <?php ActiveForm::end() ?>




    <?php endif; ?>
</div>