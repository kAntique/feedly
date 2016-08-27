<?php

namespace backend\modules\member\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "editor".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $lastname
 * @property string $avatar
 * @property string $date_register
 * @property string $website
 *
 * @property User $user
 */
class Editor extends \yii\db\ActiveRecord
{
    public $avatar_img;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'editor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'lastname', 'avatar', 'website'], 'required'],
            [['user_id'], 'integer'],
            [['date_register'], 'safe'],
            [['website'], 'string'],
            [['name', 'lastname', 'avatar'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['avatar_img'], 'file', 'skipOnEmpty' => true, 'on' => 'create', 'extensions' => 'jpg,png,gif'],
            [['website'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสผู้รวบรวม',
            'user_id' => 'User ID',
            'name' => 'ชื่อ',
            'lastname' => 'นามสกุล',
            'avatar' => 'รูปโปรไฟล์',
            'date_register' => 'วันที่สมัคร',
            'website' => 'เว็บไซต์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
