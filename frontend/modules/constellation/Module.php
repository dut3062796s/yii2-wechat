<?php

/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/27
 * Time: 上午11:52
 */
namespace frontend\modules\constellation;

use Yii;

class Module extends \yii\base\Module
{
    public $mp;

    public function process($name)
    {
        // 12星座
        $consArr = [
            '白羊座','金牛座','双子座','巨蟹座','狮子座','处女座','天秤座','天蝎座','射手座','摩羯座','水瓶座','双鱼座'
        ];

        $api = 'http://web.juhe.cn:8080/constellation/getAll';
        if($index = array_search($name, $consArr) || $index = array_search($name . '座', $consArr)) {
            $name = $consArr[$index];
            $params = [
                'key' => 'f88ec9fc05516bdae8f4916820b6c936',
                'consName' => $name,
                'type' => 'today'
            ];
            $output = Yii::$app->curl->get($api, $params);
            $str = "%s今日综合指数:%s,幸运色:%s,健康指数:%s,爱情指数:%s,财运指数:%s,幸运数字:%s,速配星座:%s,详情:%s,工作指数:%s";
            $formatStr = sprintf($str, $name, $output['all'], $output['color'], $output['health'], $output['love'], $output['money'], $output['number'], $output['QFriend'], $output['summary'], $output['work']);
            return $formatStr;
        }
    }
}