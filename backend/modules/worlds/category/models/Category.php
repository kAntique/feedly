<?php

namespace backend\modules\worlds\category\models;
use backend\modules\worlds\coverimg\models\CoverImg;
use backend\modules\worlds\rate\models\Rate;
use backend\modules\worlds\world\models\World;
use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $tags
 * @property integer $rate_id
 * @property integer $world_id
 * @property integer $cover_img_id
 *
 * @property CoverImg $coverImg
 * @property Rate $rate
 * @property World $world
 * @property Clip[] $clips
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'tags', 'rate_id', 'world_id', 'cover_img_id'], 'required'],
            [['description'], 'string'],
            [['rate_id', 'world_id', 'cover_img_id'], 'integer'],
            [['title'], 'string', 'max' => 30],
            [['tags'], 'string', 'max' => 200],
            [['cover_img_id'], 'exist', 'skipOnError' => true, 'targetClass' => CoverImg::className(), 'targetAttribute' => ['cover_img_id' => 'id']],
            [['rate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rate::className(), 'targetAttribute' => ['rate_id' => 'id']],
            [['world_id'], 'exist', 'skipOnError' => true, 'targetClass' => World::className(), 'targetAttribute' => ['world_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสหมวดหมู่',
            'title' => 'หมวดหมู่',
            'description' => 'รายละเอียด',
            'tags' => 'คำค้น',
            'rate_id' => 'ระดับความเหมาะสม',
            'world_id' => 'หัวข้อ',
            'cover_img_id' => 'ภาพปก ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoverImg()
    {
        return $this->hasOne(CoverImg::className(), ['id' => 'coverimg_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRate()
    {
        return $this->hasOne(Rate::className(), ['id' => 'rate_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorld()
    {
        return $this->hasOne(World::className(), ['id' => 'world_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClips()
    {
        return $this->hasMany(Clip::className(), ['catagory_id' => 'id']);
    }
}
