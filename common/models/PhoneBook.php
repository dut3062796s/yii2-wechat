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
        return 'we_phone_book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['true_name', 'nick_name', 'phone', 'created_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['true_name', 'nick_name'], 'string', 'max' => 50],
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
            'true_name' => 'True Name',
            'nick_name' => 'Nick Name',
            'phone' => 'Phone',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
