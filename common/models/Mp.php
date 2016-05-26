<?php

namespace common\models;

use Yii;
use yii\base\Exception;

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
class Mp extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mp}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'app_id', 'app_secret', 'token'], 'required'],
            [['title', 'app_id', 'app_secret', 'token'], 'string', 'max' => 100],
            [['title'], 'unique'],
            [['subscribe'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '公众号名称',
            'app_id' => 'App ID',
            'app_secret' => 'App Secret',
            'token' => 'Token',
            'subscribe' => '关注时自动回复内容',
            'created_at' => '创建于',
            'updated_at' => '更新于',
            'url' => '微信公众号平台要填的服务器地址'
        ];
    }
    public function attributeHints()
    {
        return [
            'token' => '(对应微信公众号平台服务器配置里的Token)'
        ];
    }

    public function getUrl()
    {
        if (!isset(Yii::$app->params['frontendUrl'])) {
            throw new Exception('必须设置前台访问地址');
        }
        return Yii::$app->params['frontendUrl'] . $this->id;
    }
}
