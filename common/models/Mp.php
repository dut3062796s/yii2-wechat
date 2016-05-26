<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "we_mp".
 *
 * @property integer $id
 * @property string $title
 * @property string $app_id
 * @property string $app_secret
 * @property string $token
 * @property integer $created_at
 * @property integer $updated_at
 */
class Mp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'we_mp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'app_id', 'app_secret', 'token', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'app_id', 'app_secret', 'token'], 'string', 'max' => 100],
            [['title'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'app_id' => 'App ID',
            'app_secret' => 'App Secret',
            'token' => 'Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
