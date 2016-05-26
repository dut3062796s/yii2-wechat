<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "we_vote".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $begin_at
 * @property integer $end_at
 */
class Vote extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%vote}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'begin_at', 'end_at', 'mp_id'], 'required'],
            [['description'], 'string'],
            [['begin_at', 'end_at'], 'filter', 'filter' => function($value){
                return strtotime($value);
            }],
            [['title'], 'string', 'max' => 50],
            [['cover'], 'string', 'max' => 255],
            [['begin_at', 'end_at'], 'hasCurrent']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '活动名',
            'cover' => '封面',
            'description' => '活动说明',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'begin_at' => '开始时间',
            'end_at' => '结束时间',
            'mp_id' => '所属公众号'
        ];
    }

    /**
     * 当前时间是否已经有存在的活动
     */
    public function hasCurrent($attribute, $params)
    {
        if (!$this->hasErrors()) {
            // 总投票个数
            $count = self::find()->count();
            // 和当前投票时间不冲突的投票个数
            $noCount = self::find()->where(['>=', 'begin_at', $this->end_at])->orWhere(['<=', 'end_at', $this->begin_at])->count();
            if ($count != $noCount) {
                $this->addError($attribute, '同一时间不能有1个以上投票活动同时进行');
            }
        }
    }

    public function getMp()
    {
        return $this->hasOne(Mp::className(), ['id' => 'mp_id']);
    }
}
