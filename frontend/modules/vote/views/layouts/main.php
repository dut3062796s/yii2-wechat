<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'options' => [
            'class' => 'navbar-inverse navbar-static-top',
        ],
    ]);
    $menuItems = [];
    $menuItems[] = ['label' => '活动说明', 'url' => ['info', 'id' => 1]];
    $menuItems[] = ['label' => '参赛人员', 'url' => ['index']];
    $menuItems[] = ['label' => '报名', 'url' => ['create']];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => false
        ]) ?>
        <?= \common\widgets\AlertPlus::widget()?>
        <?= $content ?>
    </div>
</div>
<!--回到顶部-->
<?= \common\widgets\scroll\Scroll::widget()?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
