<?php

namespace backend\modules\article\models;

use Yii;
use backend\modules\clip\models\Playlist;
/**
 * This is the model class for table "list_article".
 *
 * @property integer $playlist_id
 * @property integer $article_id
 * @property string $datetime
 *
 * @property Article $article
 * @property Playlist $playlist
 */
class ListArticle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'list_article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['playlist_id', 'article_id'], 'required'],
            [['playlist_id', 'article_id'], 'integer'],
            [['datetime'], 'safe'],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
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
            'article_id' => 'Article ID',
            'datetime' => 'Datetime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaylist()
    {
        return $this->hasOne(Playlist::className(), ['id' => 'playlist_id']);
    }
}
