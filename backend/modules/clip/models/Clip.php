<?php

namespace backend\modules\clip\models;
use backend\modules\worlds\category\models\Category;
use backend\modules\worlds\rate\models\Rate;
use backend\modules\worlds\status\models\Status;
use backend\modules\worlds\coverimg\models\CoverImg;
use Yii;

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
 * @property integer $category_id
 *
 * @property Category $category
 * @property CoverImg $coverImg
 * @property Rate $rate
 * @property Status $status
 */
class Clip extends \yii\db\ActiveRecord
{
  public $cover;
    public $openload;
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
            [['title', 'subtitle', 'year', 'ep', 'description', 'tags', 'link', 'IPaddress', 'cover_img_id', 'rate_id', 'status_id', 'category_id'], 'required'],
            [['title', 'subtitle', 'year', 'ep', 'description'], 'string'],
            [['date_time'], 'safe'],
            [['cover_img_id', 'rate_id', 'status_id', 'category_id' , 'status_link'], 'integer'],
            [['tags'], 'string', 'max' => 200],
            [['link'], 'string', 'max' => 100],
            [['IPaddress'], 'string', 'max' => 20],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['cover_img_id'], 'exist', 'skipOnError' => true, 'targetClass' => CoverImg::className(), 'targetAttribute' => ['cover_img_id' => 'id']],
            [['rate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rate::className(), 'targetAttribute' => ['rate_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
              [['cover'], 'file', 'skipOnEmpty' => true, 'on' => 'create', 'extensions' => 'jpg,png,gif'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'ชื่อเรื่อง',
            'subtitle' => 'เรื่องย่อย',
            'year' => 'ปี',
            'ep' => 'ตอน',
            'description' => 'รายละเอียด',
            'tags' => 'คำค้น',
            'link' => 'ลิงค์วิดีโอ',
            'date_time' => 'วันที่',
            'IPaddress' => 'IP_address',
            'cover_img_id' => 'ภาพปก',
            'rate_id' => 'ระดับความเหมาะสม',
            'status_id' => 'สถานะลิงค์',
            'category_id' => 'หมวดหมู่',
            'cover' => 'ภาพปก',
            'status_link' => 'สถานะลิงค์วิดีโอ'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
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
