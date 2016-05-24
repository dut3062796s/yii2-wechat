<?php

namespace frontend\controllers;

use common\models\PhoneBook;
use common\models\VoteUser;
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
        // 参加投票
        if (is_numeric($name)) {
            $vote = VoteUser::find()->where(['id' => $name])->one();
            if (!empty($vote)) {
                $vote->num += 1;
                $vote->save();
                $msg = '成功为%s号选手投票,该选手现在票数为%s,当前排在第%s名!详情:%s';
                $rank = VoteUser::find()->where(['>', 'num', $vote->num])->count() + 1;
                return $this->renderText(printf($msg, $vote->id, $vote->num, $rank, Url::to(['/vote/info', 'id' => 1], true)));
            }
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
