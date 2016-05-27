<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/11
 * Time: 下午4:14
 */

namespace common\events;


use yii\base\Event;

class CurlEvent extends Event
{
    public $params = [];
}