<?php

namespace backend\modules\worlds\coverimg\models;

use Yii;

/**
 * This is the model class for table "cover_img".
 *
 * @property integer $id
 * @property string $filename
 *
 * @property Category[] $categories
 * @property Clip[] $clips
 */
class CoverImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     public $cover;
    public static function tableName()
    {
        return 'cover_img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filename'], 'required'],
            [['filename'], 'string', 'max' => 150],
            [['cover'], 'file', 'skipOnEmpty' => true, 'on' => 'create', 'extensions' => 'jpg,png,gif','maxSize' => 409600, 'tooBig' => 'Limit is 400KB'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'ภาพปก',
            'cover' => 'รูปภาพ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['cover_img_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClips()
    {
        return $this->hasMany(Clip::className(), ['cover_img_id' => 'id']);
    }
}
