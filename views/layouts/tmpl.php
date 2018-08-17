<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/

-->
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html>
<head>
	<?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>      

            <meta charset="<?= Yii::$app->charset ?>">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
    <?php $this->beginBody() ?>
<!---header---->			
<div class="header">  
	 <div class="container">
		  <div class="logo">
                      <a href="<?= yii\helpers\Url::home() ?>"><?= Html::img('@web/images/logo.jpg', ['alt' => 'Blog']) ?></a>
		  </div>
			 <!---start-top-nav---->
			 <div class="top-menu">
				 <div class="search">
					 <form>
					 <input type="text" placeholder="" required="">
					 <input type="submit" value=""/>
					 </form>
				 </div>
                             <!--
				  <span class="menu"> </span> 
				   <ul>
						<li class="active"><a href="/">HOME</a></li>	
                                                <li><a href="/site/hello">Hello</a></li>
						<li><a href="/site/about">ABOUT</a></li>	
						<li><a href="/site/contact">CONTACT</a></li>						
						<div class="clearfix"> </div>
				 </ul> -->
                             
                             
                             
                                 <?php
    NavBar::begin([
       /* 'brandLabel' => Yii::$app->name,*/
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'menu',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
            ['label' => 'Home', 'url' => ['/']],
			['label' => 'Hello', 'url' => ['/site/hello']],
            ['label' => 'Blog', 'url' => ['/post/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
			 </div>
                         
                         
			 <div class="clearfix"></div>
					<script>
					$("span.menu").click(function(){
					$(".top-menu ul").slideToggle("slow" , function(){
					});
					});
					</script>
				<!---//End-top-nav---->	
                                
                                
                                
	 </div>
</div>
<!--/header-->
<div class="single">
	 <div class="container">
		  <div class="col-md-8 single-main">				 
			  <div class="single-grid">
					  <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
			  </div>
			
			
		  </div>

			  <div class="col-md-4 side-content">
				<?= $this->render('_sidebar');?>
			  </div>
			  <div class="clearfix"></div>
		  </div>
	  </div>
</div>
<!---->
<div class="footer">
	 <div class="container">
	  <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
	 </div>
</div>

	
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>