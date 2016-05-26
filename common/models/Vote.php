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
            'description' => '活动说明',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'begin_at' => '开始时间',
            'end_at' => '结束时间',
            'mp_id' => '所属公众号'
        ];
    }

    public function getMp()
    {
        return $this->hasOne(Mp::className(), ['id' => 'mp_id']);
    }
}
