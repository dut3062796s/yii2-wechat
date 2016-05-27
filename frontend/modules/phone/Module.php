<?php

/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/27
 * Time: 下午1:22
 */
namespace frontend\modules\phone;

use common\models\PhoneBook;
use yii\db\Expression;

class Module extends \yii\base\Module
{
    public function process($name)
    {
        // 电话
        $model = PhoneBook::find()->where(['true_name' => $name])->orWhere(new Expression("FIND_IN_SET('" . $name . "', nick_name)"))->one();
        if (!empty($model)) {
            return $model->phone;
        }
        return null;
    }
}