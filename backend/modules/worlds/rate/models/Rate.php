<?php

namespace backend\modules\worlds\rate\models;

use Yii;

/**
 * This is the model class for table "rate".
 *
 * @property integer $id
 * @property string $rate_name
 * @property string $description
 *
 * @property Category[] $categories
 * @property Clip[] $clips
 */
class Rate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rate_name', 'description'], 'required'],
            [['description'], 'string'],
            [['rate_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rate_name' => 'Rate Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['rate_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClips()
    {
        return $this->hasMany(Clip::className(), ['rate_id' => 'id']);
    }
}
