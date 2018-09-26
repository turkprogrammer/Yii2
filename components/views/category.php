
<?php if (!empty($cats)) : ?>
    <ul>
        <?php foreach ($cats as $cat) : ?>
            <li>  
              <i class="glyphicon glyphicon-list" aria-hidden="true"></i> <a href="<?= yii\helpers\Url::to(['category/view', 'id'=>$cat['id']]) ?>"><?= $cat['name'] ?> </a> 
            </li>                    
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


