<?php

namespace frontend\controllers;

use Yii;
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/20
 * Time: 下午2:58
 */
class SiteController extends Controller
{
    public function beforeAction($action)
    {
        Yii::$container->set('yii\web\XmlResponseFormatter', [
            'rootTag' => 'xml'
        ]);
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $xml = Yii::$app->request->getRawBody();
        $params = (array)simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
        return [
            'ToUserName' => $params['FromUserName'], //接收方帐号（收到的OpenID）
            'FromUserName' => $params['ToUserName'], //开发者微信号
            'CreateTime' => time(),
            'MsgType' => 'text',
            'Content' => 'hehe'
        ];
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = '51siyuan';
        $tmpArr = [$token, $timestamp, $nonce];
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }
}