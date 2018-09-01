<?php
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (!empty($cats)) : ?>
    <dl class="dl-horizontal">
        <?php foreach ($cats as $cat) : ?>
            <dt col-sm-3>
               <a href="<?= yii\helpers\Url::to(['category/view', 'id'=>$cat['id']]) ?>"><?= $cat['name'] ?> </a> 
            </dt> 
                 <dd class="col-sm-9" style="font-size:10pt;"><?= $cat['description'] ?></dd>
        <?php endforeach; ?>
    </dl>
<?php endif; ?>
