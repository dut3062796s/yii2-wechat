<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/20
 * Time: 下午3:05
 */

namespace frontend\controllers;


class Controller extends \yii\rest\Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        unset($behaviors['contentNegotiator']['formats']['application/json']);
        unset($behaviors['rateLimiter']);
        return $behaviors;
    }
}