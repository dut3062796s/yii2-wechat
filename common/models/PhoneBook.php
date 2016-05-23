<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "we_phone_book".
 *
 * @property integer $id
 * @property string $true_name
 * @property string $nick_name
 * @property string $phone
 * @property integer $created_at
 * @property integer $updated_at
 */
class PhoneBook extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%phone_book}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['true_name', 'nick_name', 'phone'], 'required'],
            [['true_name', 'nick_name'], 'string', 'max' => 50],
            [['gender'], 'integer'],
            [['phone'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'true_name' => '真名',
            'nick_name' => '外号',
            'phone' => '电话号码',
            'gender' => '性别',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
