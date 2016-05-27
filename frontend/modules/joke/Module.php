<?php

/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/27
 * Time: 下午1:27
 */

namespace frontend\modules\joke;

use Yii;

class Module extends \yii\base\Module
{
    public $mp;

    public function process($name)
    {
        $api = 'http://japi.juhe.cn/joke/content/text.from';

        if($name == '笑话') {
            $params = [
                'key' => 'c722c3da3a13044f0fad2b3b11030e6f',
                'page' => 1,
                'pagesize' => 3
            ];
            $output = Yii::$app->curl->get($api, $params);
            $str = '';
            foreach ($output['result']['data'] as $k => $joke) {
                $str .= ($k + 1) . '. ' . $joke['content'] . "\n";
            }
            return $str;
        }
        return null;
    }
}