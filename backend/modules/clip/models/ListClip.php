<?php

namespace backend\modules\clip\models;

use Yii;

/**
 * This is the model class for table "list_clip".
 *
 * @property integer $playlist_id
 * @property integer $clip_id
 * @property string $datetime
 *
 * @property Clip $clip
 * @property Playlist $playlist
 */
class ListClip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'list_clip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['playlist_id', 'clip_id'], 'required'],
            [['playlist_id', 'clip_id'], 'integer'],
            [['datetime'], 'safe'],
            [['clip_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clip::className(), 'targetAttribute' => ['clip_id' => 'id']],
            [['playlist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Playlist::className(), 'targetAttribute' => ['playlist_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'playlist_id' => 'Playlist ID',
            'clip_id' => 'Clip ID',
            'datetime' => 'Datetime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClip()
    {
        return $this->hasOne(Clip::className(), ['id' => 'clip_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaylist()
    {
        return $this->hasOne(Playlist::className(), ['id' => 'playlist_id']);
    }
}
