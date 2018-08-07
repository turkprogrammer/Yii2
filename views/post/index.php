<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">


    <div class="body-content">

        <div class="row">
            
            
             
            
            
           <?php //echo $text ;?>
            <br/>
            
            <?php if(!empty ($posts) ) :?>
            
            <?php foreach ($posts as $post) :?>
             <div class="content-grid">					 
					 <div class="content-grid-info">
						 <!--<a href="/"><img src="images/post1.jpg" title="" /></a> -->
						
						 <div class="post-info">
                                                     <h4><a href="<?= \yii\helpers\Url::to(['post/view', 'id'=>$post->id])?>"><?=$post->title ?></a>  <span class="label label-default">July 30, 2014 / 27 Comments</span></h4>
						 <p><?= $post->excerpt ?></p>
						 
						 <a href="site/about/"><span></span>READ MORE</a>
						 </div>
					 </div>
					
					 
				 </div>
            
            <?php endforeach;?>
            <?= yii\widgets\LinkPager::widget(['pagination' => $pages]) ;?>
            <?php endif ;?>
            
            
            
            
          
        </div>

    </div>
</div>
