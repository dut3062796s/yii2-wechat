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
            [['name', 'cover'], 'required'],
            [['description'], 'string'],
            [['num'], 'integer'],
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
            'name' => '名字',
            'description' => '简介',
            'created_at' => '参加时间',
            'updated_at' => '更新时间',
            'num' => '票数',
            'cover' => '封面',
        ];
    }
}
