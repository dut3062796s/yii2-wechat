<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/20
 * Time: 下午3:05
 */

namespace frontend\controllers;


use yii\helpers\Url;

class Controller extends \yii\rest\Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        unset($behaviors['contentNegotiator']['formats']['application/json']);
        unset($behaviors['rateLimiter']);
        return $behaviors;
    }

    public function renderText($text)
    {
        return [
            'ToUserName' => \Yii::$app->request->bodyParams['FromUserName'], //接收方帐号（收到的OpenID）
            'FromUserName' => \Yii::$app->request->bodyParams['ToUserName'], //开发者微信号
            'CreateTime' => time(),
            'MsgType' => 'text',
            'Content' => $text
        ];
    }

    public function renderNews($articles = [])
    {
        return [
            'ToUserName' => \Yii::$app->request->bodyParams['FromUserName'], //接收方帐号（收到的OpenID）
            'FromUserName' => \Yii::$app->request->bodyParams['ToUserName'], //开发者微信号
            'CreateTime' => time(),
            'MsgType' => 'news',
            'ArticleCount' => count($articles),
            'Articles' => [
                'item' => [
                    'Title' => 'hehe',
                    'Description' => 'hehe',
                    'PicUrl' => 'http://image.51siyuan.cn/FoRmm00iYHHZg9XDEeC9-8ns23lv',
                    'Url' => Url::to(['/vote/index'], true)
                ]
            ]
        ];
    }
}