<?php

namespace backend\modules\worlds\world\models;

use Yii;

/**
 * This is the model class for table "world".
 *
 * @property integer $id
 * @property string $world_name
 *
 * @property Category[] $categories
 */
class World extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'world';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['world_name'], 'required'],
            [['world_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'world_name' => 'ประเภท',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['world_id' => 'id']);
    }
}
