<?php

namespace backend\modules\playlist\models;

use Yii;
use backend\modules\worlds\category\models\Category;
use backend\modules\worlds\coverimg\models\CoverImg;
/**
 * This is the model class for table "playlist".
 *
 * @property integer $id
 * @property string $name
 * @property string $date
 * @property string $description
 * @property integer $cover_img_id
 * @property integer $category_id
 *
 * @property Category $category
 * @property CoverImg $coverImg
 * @property PlaylistHasClip[] $playlistHasClips
 * @property Clip[] $clips
 */
class Playlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $cover;
    public static function tableName()
    {
        return 'playlist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'cover_img_id', 'category_id'], 'required'],
            [['date'], 'safe'],
            [['description'], 'string'],
            [['cover_img_id', 'category_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['cover_img_id'], 'exist', 'skipOnError' => true, 'targetClass' => CoverImg::className(), 'targetAttribute' => ['cover_img_id' => 'id']],
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
            'name' => 'ชื่อเพลลิสต์',
            'date' => 'Date',
            'description' => 'รายละเอียด',
            'cover_img_id' => 'ภาพปก',
            'category_id' => 'หมวดหมู่',
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
    public function getPlaylistHasClips()
    {
        return $this->hasMany(PlaylistHasClip::className(), ['playlist_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClips()
    {
        return $this->hasMany(Clip::className(), ['id' => 'clip_id'])->viaTable('playlist_has_clip', ['playlist_id' => 'id']);
    }
}
