<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "we_vote".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $num
 * @property string $cover
 */
class VoteUser extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%vote_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'cover'], 'required'],
            [['description'], 'string'],
            [['num', 'vote_id'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['cover'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vote_id' => '投票活动',
            'name' => '名字',
            'description' => '简介',
            'created_at' => '参加时间',
            'updated_at' => '更新时间',
            'num' => '票数',
            'cover' => '封面',
        ];
    }

    /**
     * 排名
     * @return int
     */
    public function getRank()
    {
        return self::find()->where(['vote_id' => $this->vote_id])->andWhere(['>', 'num', $this->num])->count() + 1;
    }
}
