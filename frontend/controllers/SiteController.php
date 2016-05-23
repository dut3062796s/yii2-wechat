<?php

namespace frontend\controllers;

use common\models\PhoneBook;
use Yii;
use yii\db\Expression;
use yii\helpers\Url;

/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/20
 * Time: 下午2:58
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        $params = Yii::$app->request->getBodyParams();
        $msgType = $params['MsgType'];
        if ($msgType == 'event') {
            return $this->event();
        }
        if ($msgType == 'voice') {
            $name = trim($params['Recognition'], '！');
        } elseif ($msgType == 'text') {
            $name = trim($params['Content']);
        } else {
            return $this->renderText('说人话！');
        }
        if ($name == '投票') {
            return $this->renderText(Url::to(['/vote/index'], true));
        }
        $model = PhoneBook::find()->where(['true_name' => $name])->orWhere(new Expression("FIND_IN_SET('" . $name . "', nick_name)"))->one();
        if (empty($model)) {
            return $this->renderText('能不能说一个靠谱的！');
        }
        return $this->renderText($model->phone);
    }

    public function event()
    {
        if (Yii::$app->request->bodyParams['Event'] == 'subscribe') {
            return $this->renderText('1.回复姓名或者外号可快速查找电话号码');
        }
    }

}
