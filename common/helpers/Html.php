<?php

/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/23
 * Time: 下午5:21
 */
namespace common\helpers;

use yii\helpers\Url;
use rmrevin\yii\fontawesome\FA;

class Html extends \yii\helpers\Html
{
    public static function img($src, $options = [])
    {
        $options['src'] = Url::to($src);
        if (strpos($options['src'], 'http') === false) {
            $options['src'] = \Yii::getAlias('@static') . '/' . $options['src'];
        }
        if (!isset($options['alt'])) {
            $options['alt'] = '';
        }
        return static::tag('img', '', $options);
    }

    public static function icon($name, $options = [])
    {
        return FA::i($name, $options);
    }
}