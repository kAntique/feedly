<?php

namespace backend\modules\article\models;
use backend\modules\worlds\category\models\Category;
use backend\modules\worlds\rate\models\Rate;
use backend\modules\worlds\status\models\Status;
use backend\modules\worlds\coverimg\models\CoverImg;
use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $headline
 * @property string $content
 * @property string $date_time
 * @property string $IPaddress
 * @property string $tags
 * @property integer $rate_id
 * @property integer $cover_img_id
 * @property integer $world_id
 * @property integer $category_id
 * @property integer $status_id
 *
 * @property Category $category
 * @property CoverImg $coverImg
 * @property Rate $rate
 * @property Status $status
 * @property World $world
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['headline', 'content', 'IPaddress', 'tags', 'rate_id', 'cover_img_id', 'world_id', 'category_id', 'status_id'], 'required'],
            [['content'], 'string'],
            [['date_time'], 'safe'],
            [['rate_id', 'cover_img_id', 'world_id', 'category_id', 'status_id'], 'integer'],
            [['headline'], 'string', 'max' => 150],
            [['IPaddress'], 'string', 'max' => 20],
            [['tags'], 'string', 'max' => 200],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'headline' => 'Headline',
            'content' => 'Content',
            'date_time' => 'Date Time',
            'IPaddress' => 'Ipaddress',
            'tags' => 'Tags',
            'rate_id' => 'Rate ID',
            'cover_img_id' => 'Cover Img ID',
            'world_id' => 'World ID',
            'category_id' => 'Category ID',
            'status_id' => 'Status ID',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorld()
    {
        return $this->hasOne(World::className(), ['id' => 'world_id']);
    }
}
