<?php
use app\models\Post; // подключаем модель Постов
?>


<?php if (!empty($cats)) : ?>
    <ul>
        <?php foreach ($cats as $cat) : ?>
        <?php  $count = Post::find()->where(['category_id' => $cat['id']])->count(); ?>
            <li>  
              <i class="glyphicon glyphicon-list" aria-hidden="true"></i> <a href="<?= yii\helpers\Url::to(['category/view', 'id'=>$cat['id']]) ?>"><?= $cat['name'] ?> </a>
         <span class="badge"><?=$count?></span>
            </li>                    
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


