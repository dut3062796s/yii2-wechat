<?php

/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/26
 * Time: 下午2:42
 */
namespace frontend\modules\vote;

use common\models\Vote;
use common\models\VoteUser;
use yii\helpers\Url;

class Module extends \yii\base\Module
{
    public $layout = '@frontend/modules/vote/views/layouts/main';

    public $mp;

    public $controller;

    public function process($name)
    {
        if ($name == '投票') {
            // 获取当前正在进行中的投票
            $vote = Vote::find()->where(['<', 'begin_at', time()])->andWhere(['>', 'end_at', time()])->one();
            if (empty($vote)) {
                return '当前没有正在进行的投票活动!';
            } else {
                $articles = [
                    [
                        'Title' => $vote->title,
                        'Description' => strip_tags($vote->description),
                        'PicUrl' => \Yii::getAlias('@static') . '/' . $vote->cover,
                        'Url' => Url::to(['/vote', 'id' => $vote->id], true)
                    ]
                ];
                return $articles;
            }
        }
        // 参加投票
        if (is_numeric($name)) {
            $voteUser = VoteUser::find()->where(['id' => $name])->one();
            if (!empty($voteUser)) {
                $voteUser->num += 1;
                $voteUser->save();
                $msg = '成功为%s号选手投票,该选手现在票数为%s,当前排在第%s名!详情:%s';
                $rank = $voteUser->rank;
                return sprintf($msg, $voteUser->id, $voteUser->num, $rank, Url::to(['/vote/info', 'id' => 1], true));
            }
        }
        return null;
    }
}