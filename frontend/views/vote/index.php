<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/23
 * Time: 下午4:59
 */
$this->title = '参赛人员列表';
$this->params['breadcrumbs'][] = ['label' => '参加大赛', 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_vote',
]);?>

