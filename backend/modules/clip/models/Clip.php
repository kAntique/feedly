<?php

namespace backend\modules\clip\models;

use Yii;
use backend\modules\worlds\category\models\Category;
use backend\modules\worlds\coverimg\models\CoverImg;
use backend\modules\worlds\rate\models\Rate;
use backend\modules\worlds\status\models\Status;
/**
 * This is the model class for table "clip".
 *
 * @property integer $id
 * @property string $title
 * @property string $subtitle
 * @property string $year
 * @property string $ep
 * @property string $description
 * @property string $tags
 * @property string $link
 * @property string $date_time
 * @property string $IPaddress
 * @property integer $cover_img_id
 * @property integer $rate_id
 * @property integer $status_id
 * @property integer $catagory_id
 *
 * @property Category $catagory
 * @property CoverImg $coverImg
 * @property Rate $rate
 * @property Status $status
 */
class Clip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'subtitle', 'year', 'ep', 'description', 'tags', 'link', 'IPaddress', 'cover_img_id', 'rate_id', 'status_id', 'catagory_id'], 'required'],
            [['title', 'subtitle', 'year', 'ep', 'description'], 'string'],
            [['date_time'], 'safe'],
            [['cover_img_id', 'rate_id', 'status_id', 'catagory_id'], 'integer'],
            [['tags'], 'string', 'max' => 200],
            [['link'], 'string', 'max' => 45],
            [['IPaddress'], 'string', 'max' => 20],
            [['catagory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['catagory_id' => 'id']],
            [['cover_img_id'], 'exist', 'skipOnError' => true, 'targetClass' => CoverImg::className(), 'targetAttribute' => ['cover_img_id' => 'id']],
            [['rate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rate::className(), 'targetAttribute' => ['rate_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
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
            'subtitle' => 'Subtitle',
            'year' => 'Year',
            'ep' => 'Ep',
            'description' => 'Description',
            'tags' => 'Tags',
            'link' => 'Link',
            'date_time' => 'Date Time',
            'IPaddress' => 'Ipaddress',
            'cover_img_id' => 'Cover Img ID',
            'rate_id' => 'Rate ID',
            'status_id' => 'Status ID',
            'catagory_id' => 'Catagory ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatagory()
    {
        return $this->hasOne(Category::className(), ['id' => 'catagory_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoverImg()
    {
        return $this->hasOne(CoverImg::className(), ['id' => 'cover_img_id']);
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
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }
}
