
<?php if (!empty($cats)) : ?>
    <ul>
        <?php foreach ($cats as $cat) : ?>
            <li>  
                <blockquote><a href="<?= yii\helpers\Url::to(['category/view', 'id'=>$cat['id']]) ?>"><?= $cat['name'] ?> </a> </blockquote>
            </li>                    
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


