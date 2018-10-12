
<div class="categories">
    <h3>Категории </h3> 
    <?= app\components\CatsWidget::widget() ?>
</div>
<br/>
<h3>Тестовый виджет</h3>
<br/>
<span class="label label-danger"><?= app\components\TestWidget::widget() ?></span>
<hr/>
<br/>
<h3>Последние записи</h3>
<br/>
<?= app\components\ListWidget::widget() ?>
<hr/>
<br/>
<a href="<?php echo yii\helpers\Url::to('/admin') ?>"> Админка <i class="glyphicon glyphicon-user" aria-hidden="true"></i></a>
<br/>
<?php if (!Yii::$app->user->isGuest) : ?>
    <a href="<?= yii\helpers\Url::to('/site/logout') ?>"><?= Yii::$app->user->identity['username'] ?> (Выход) <i class="glyphicon glyphicon-log-out" aria-hidden="true"></i></a>
<?php else : ?>
    <a id="login" href="<?php echo yii\helpers\Url::to('/site/login') ?>">Вход <i class="glyphicon glyphicon-log-in" aria-hidden="true"></i></a>
    <br/>
    <a id="signup" href="<?php echo yii\helpers\Url::to('/site/signup') ?>">Регистрация <i class="glyphicon glyphicon-cog" aria-hidden="true"></i></a>
    <?php endif; ?>
    <?php //var_dump(Yii::$app->user->identity) ;?>


