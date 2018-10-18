<?php use \yii\Helpers\Html;?>
<div class="categories">
    <h3>Категории </h3> 
 <div class="jumbotron">   <?= app\components\CatsWidget::widget() ?></div>
</div>
<br/>
<h3>Тестовый виджет</h3>
<br/>

<div class="jumbotron"><?= app\components\TestWidget::widget() ?></div>
<hr/>
<br/>
<h3>Последние записи</h3>
<br/>
<?= app\components\ListWidget::widget() ?>

<hr/>
<br/>

<div class="panel panel-default">
    <div class="panel-body">
        <a href="<?php echo yii\helpers\Url::to('/admin') ?>"> Админка <i class="glyphicon glyphicon-user" aria-hidden="true"></i></a>
		<?= Html::tag('code', 'Your IP is '	. Yii::$app->request->userIP);?>
        <br/>
        <?php if (!Yii::$app->user->isGuest) : ?>
            <a href="<?= yii\helpers\Url::to('/site/logout') ?>"><?= Yii::$app->user->identity['username'] ?> (Выход) <i class="glyphicon glyphicon-log-out" aria-hidden="true"></i></a>
        <?php else : ?>
            <a id="login" href="<?php echo yii\helpers\Url::to('/login') ?>">Вход <i class="glyphicon glyphicon-log-in" aria-hidden="true"></i></a>
            <br/>
            <a id="signup" href="<?php echo yii\helpers\Url::to('/signup') ?>">Регистрация <i class="glyphicon glyphicon-cog" aria-hidden="true"></i></a>
            <?php endif; ?>
    </div>
</div>

<div class="jumbotron1"><?//= app\components\CommentsWidget::widget() ?></div>

<?php //var_dump(Yii::$app->user->identity) ;?>



