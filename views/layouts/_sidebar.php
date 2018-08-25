
<div class="categories">
        <h3>Категории</h3>
        <?= app\components\CatsWidget::widget() ?>
</div>
<br/>
<h3>Тестовый виджет</h3>
<br/>
        <span class="label label-danger"><?= app\components\TestWidget::widget() ?></span>
        <hr/>
        
        <a href="<?php echo yii\helpers\Url::to('/admin')?>"> Админка</a>
        <br/>
        <?php if(!Yii::$app->user->isGuest) : ?>
        <a href="<?= yii\helpers\Url::to('/site/logout')?>"><?= Yii::$app->user->identity['username'] ?> (Выход)</a>
               <?php else : ?>
              <a href="<?php echo yii\helpers\Url::to('/site/login')?>">Вход </a>
              <br/>
              <a href="<?php echo yii\helpers\Url::to('/site/signup')?>">Регистрация</a>
                      
        <?php endif; ?>

<?php //var_dump(Yii::$app->user->identity) ;?>

