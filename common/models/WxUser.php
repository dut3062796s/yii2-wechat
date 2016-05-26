<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "we_wx_user".
 *
 * @property integer $id
 * @property string $openid
 * @property integer $created_at
 * @property integer $updated_at
 */
class WxUser extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wx_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['openid'], 'required'],
            [['is_subscribe', 'mp_id'], 'integer'],
            [['openid'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'openid' => 'Openid',
            'is_subscribe' => '是否关注',
            'mp_id' => '所属公众号',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
